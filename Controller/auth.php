<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 16:23
 */
class auth {
    public function index_action() {

    }

    public function logout() {
        unset($_SESSION['user']);
        header('Location: '.URL_PREFIX.'/');
    }

    public function login() {
        Security::SignIn($_REQUEST['login'], $_REQUEST['password']);
        header('Location: '.URL_PREFIX.'/admin');
    }
}