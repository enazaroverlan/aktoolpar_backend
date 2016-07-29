<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 18.07.2016
 * Time: 16:48
 */
class View {
    public static function GetHeader() {
        return include_once(get_include_path().'/Models/header.php');
    }

    public static function GetFooter() {
        return include_once(get_include_path().'/Models/footer.php');
    }

    public static function GetMainPage() {
        $page = self::GetHeader();
        $page .= include_once(get_include_path().'/Models/pages/main_page.php');
        $page .= self::GetFooter();

        return $page;
    }

    public static function GetAboutPage() {
        $page = self::GetHeader();
        $page .= include_once(get_include_path().'/Models/pages/about_page.php');
        $page .=self::GetFooter();

        return $page;
    }

    public static function GetBuiltPage() {
        $page = self::GetHeader();
        $page .= include_once(get_include_path().'/Models/pages/built_page.php');
        $page .= self::GetFooter();

        return $page;
    }
}