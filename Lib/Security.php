<?php

/**
 * Created by PhpStorm.
 * User: �����
 * Date: 18.07.2016
 * Time: 16:46
 */
class Security {
    public static $isAuth;

    public static function GetStatus() {
        if(isset($_SESSION['user'])) {
            if($_SESSION['user']['role'] == 'admin') {
                return array('isAuth' => true, 'role' => 'admin', 'login' => $_SESSION['user']['login']);
            } else if($_SESSION['user']['role'] == 'user') {
                return array('isAuth' => true, 'role' => 'user', 'login' => $_SESSION['user']['login']);
            } else if($_SESSION['user']['role'] == 'super_admin') {
                return array('isAuth' => true, 'role' => 'super_admin', 'login' => $_SESSION['user']['login']);
            }
        } else {
            return array('isAuth' => false);
        }
    }

    public static function SignIn($login, $password) {
        $password = md5($password);

        $user = User_Service::GetUserByLogin($login);

        if($user != null) {
            if($user['password'] == $password) {
                self::$isAuth = true;
                $_SESSION['user'] = array('isAuth' => true, 'role' => $user['role'], 'login' => $user['login']);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}