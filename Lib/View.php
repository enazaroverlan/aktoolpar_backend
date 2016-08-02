<?php

/**
 * Created by PhpStorm.
 * User: �����
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

    public static function GetAdminHeader() {
        return include_once(get_include_path().'/Models/admin/admin_header.php');
    }

    public static function GetAdminFooter() {
        return include_once(get_include_path().'/Models/admin/admin_footer.php');
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

    public static function GetOneBuildPage() {
        $page = self::GetHeader();
        $page .= include_once(PROJECT_PATH.'/Models/pages/one_build_page.php');
        $page .= self::GetFooter();

        return $page;
    }

    public static function GetContactsPage() {
        $page = self::GetHeader();
        $page .= include_once(PROJECT_PATH.'/Models/pages/contacts.php');
        $page .= self::GetFooter();

        return $page;
    }

    // ======================================== Admin View ============================================================
    public static function GetLoginPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(get_include_path().'/Models/admin/page/login.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetObjectsPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/objects/dashboard.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetObjectEditPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/objects/edit.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetObjectAddPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/objects/add.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetRentDashboard() {
        $page = self::GetAdminHeader();
        $page .= include_once(get_include_path().'/Models/admin/page/rent/dashboard.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetRentEditPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(get_include_path().'/Models/admin/page/rent/edit.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetCertificatesPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/certificates/dashboard.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetCertificatesEditPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/certificates/edit.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetCertificatesAddPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/certificates/add.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetUsersDashboard() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/users/dashboard.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetUserEditPage(){
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/users/edit.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetMediaDashboard() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/media/dashboard.php');
        $page .= self::GetAdminFooter();

        return $page;
    }

    public static function GetMediaEditPage() {
        $page = self::GetAdminHeader();
        $page .= include_once(PROJECT_PATH.'/Models/admin/page/media/edit.php');
        $page .= self::GetAdminFooter();

        return $page;
    }
    // ======================================== End Admin View ========================================================
}