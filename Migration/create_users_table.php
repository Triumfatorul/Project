<?php

class create_users_table {
    private static $query;

    public static function set_query() {
        self::$query = "CREATE TABLE users(
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username varchar(30) NOT NULL,
            pass varchar(200) NOT NULL,
            create_date datetime NOT NULL
        );";

        return self::$query;
    }
}
