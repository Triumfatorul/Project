<?php

class add_like_column_to_posts_table {
    private static $query;

    public static function set_query() {
        self::$query =  "ALTER TABLE posts ADD likes int";

        return self::$query;
    }
}
