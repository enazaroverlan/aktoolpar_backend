<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 29.07.2016
 * Time: 18:12
 */
class objects {

    public function index_action() {
        return "Hello World!!";
    }

    public function built() {
        return View::GetBuiltPage();
    }
}