<?php

class create_posts_table {
    private static $query;

    public static function set_query() {
        self::$query = "CREATE TABLE posts(
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(30)  NOT NULL,
            body VARCHAR(300) NOT NULL,
            author varchar(100) NOT NULL,
            post_date datetime NOT NULL
        );";

        return self::$query;
    }
}
