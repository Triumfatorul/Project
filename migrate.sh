#!/usr/bin/bash

myvariable=$(/c/xampp/php/php Model/MigrationModel.php)
IFS=" " read -ra migrations_done <<< "$myvariable"
cd Migration
dirlist=(`ls ${prefix}*.php`)
for migration in "${migrations_done[@]}"; do
     for i in "${dirlist[@]}"; do
         if [ $i == $migration ] ;
         then 
            dirlist=("${dirlist[@]/$i}")
         fi
     done
done
cd ..


touch "migrate.php"
    echo "<?php
require_once('Model/GeneralModel.php');
\$db = GeneralModel::init_db();" >> "migrate.php"
for i in "${dirlist[@]}"; do 
if [[ ! -z "$i" ]] ;
then
    class=$(echo "$i" | cut -f 1 -d '.')    #file name without extension to use as a class 
    echo "require_once('Migration/${i}');
    \$db->query(${class}::set_query());
    \$db->query(\"INSERT INTO migrations (migration_name) VALUES ('$i')\");

    " >> "migrate.php"
fi
done

/c/xampp/php/php migrate.php
wait
truncate -s 0 "migrate.php"
wait
echo "Migrations done!"
