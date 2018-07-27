<?php

class add_dislike_column_to_posts_table {
    private static $query;

    public static function set_query() {
        self::$query =  "ALTER TABLE posts ADD dislikes int";

        return self::$query;
    }
}
