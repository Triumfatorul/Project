<?php

 
class GeneralModel {
    private static $dbconn;

    public static function init_db() {
		
		if (is_null(self::$dbconn)) {
		
			$dsn = 'mysql:host=localhost;dbname=test;';
			$user = 'root';
			$pass = '';
	
			self::$dbconn =  new PDO('mysql:host=localhost;dbname=test', $user, $pass);

		
		}
		
		return self::$dbconn;
		
	}
}
