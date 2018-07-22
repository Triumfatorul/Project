<?php


require_once("GeneralModel.php");
 
class MigrationModel {
    public static function checkMigartion(){
        $db = GeneralModel::init_db();
    
        $query = "SELECT * FROM migrations";
        $output = '';
        if($db->query($query) !== false){
            foreach($db->query($query) as $row) {
               $output .= $row['migration_name']." ";
            }
        }
        echo $output;
    }
}


MigrationModel::checkMigartion();