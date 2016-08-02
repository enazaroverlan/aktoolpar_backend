<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 16:33
 */
class User_Service {
    public static function GetAllUsers() {
        $query = "SELECT * FROM users";
        $result = mysqli_query(Database::Connect(), $query);

        $n = mysqli_num_rows($result);
        $users = array();

        for($i=0; $i<$n; ++$i) {
            $row = mysqli_fetch_assoc($result);
            $users[$i] = $row;
        }

        return $users;
    }

    public static function GetUserByLogin($login) {
        $query = "SELECT * FROM users WHERE login='$login'";
        $result = mysqli_query(Database::Connect(), $query);

        return mysqli_fetch_assoc($result);
    }

    public static function GetUserByID($id) {
        $query = "SELECT * FROM users WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return mysqli_fetch_assoc($result);
    }

    public static function AddNewUser(array $user_info) {
        $login = $user_info['login'];
        $password = md5($user_info['password']);
        $role = $user_info['role'];
        $query = "INSERT INTO users(login, password, role) VALUES ('$login', '$password', '$role')";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }

    public static function EditUser(array $user_info) {
        $id = $user_info['id'];
        $login = $user_info['login'];
        $password = md5($user_info['password']);
        $role = $user_info['role'];
        $query = "UPDATE users SET login='$login', password='$password', role='$role' WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }

    public static function EditUserWithoutPassword(array $user_info) {
        $id = $user_info['id'];
        $login = $user_info['login'];
        $role = $user_info['role'];

        $query = "UPDATE users SET login='$login', role='$role' WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }
}