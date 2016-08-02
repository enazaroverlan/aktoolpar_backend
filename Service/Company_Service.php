<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 31.07.2016
 * Time: 20:47
 */
class Company_Service {
    public static function GetAllCompanies() {
        $query = "SELECT * FROM company";
        $result = mysqli_query(Database::Connect(), $query);

        $n = mysqli_num_rows($result);
        $companies = array();

        for($i=0; $i < $n; ++$i) {
            $row = mysqli_fetch_assoc($result);
            $companies[$i] = $row;
        }

        return $companies;
    }

    public static function GetCompanyByID($id) {
        $query = "SELECT * FROM company WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return mysqli_fetch_assoc($result);
    }
}