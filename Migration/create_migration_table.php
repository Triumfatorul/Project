<?php


class create_migration_table {
    public static $query;

    public static function set_query() {
            self::$query = "CREATE TABLE  migrations(
                id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                migration_name varchar(100) NOT NULL
            );";

        return self::$query;
    }
}
