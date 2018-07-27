<?php

 
class GeneralModel {
    private static $dbconn;


	/*
		* Check if conn exist 
		* If doesn't exist create it
		* Return  db conn
	*/ 
    public static function init_db() {
		
		if (is_null(self::$dbconn)) {
		
			$dsn = 'mysql:host=localhost;dbname=test;';
			$user = 'root';
			$pass = '';
			$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
			self::$dbconn =  new PDO('mysql:host=localhost;dbname=test', $user, $pass, $options);

		
		}
		
		return self::$dbconn;
		
	}
}
