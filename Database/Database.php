<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 18.07.2016
 * Time: 16:19
 */
class Database {
    private static $con;

    public static function Connect() {
        if(self::$con != null) {
            return self::$con;
        }
        return self::$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
}