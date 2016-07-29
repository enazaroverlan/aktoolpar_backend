<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 18.07.2016
 * Time: 16:25
 */
class ErrorHandler {
    public static function ConvertError($error_code) {
        $error_description = "";
        switch($error_code) {
            case 101: $error_description = ERROR_101; break;
            case 102: $error_description = ERROR_102; break;
            case 103: $error_description = ERROR_103; break;
        }
        return json_encode(array('error_code' => $error_code, 'description' => $error_description));
    }
}