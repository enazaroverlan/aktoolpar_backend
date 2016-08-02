<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 19:17
 */
class Rent_Service {
    public static function GetAllRentEl() {
        $query = "SELECT * FROM technic";
        $result = mysqli_query(Database::Connect(), $query);

        $n = mysqli_num_rows($result);
        $rent_object = array();

        for($i=0; $i<$n; ++$i) {
            $row = mysqli_fetch_assoc($result);
            $rent_object[$i] = $row;
        }

        return $rent_object;
    }

    public static function GetRentElByID($id) {
        $query = "SELECT * FROM technic WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return mysqli_fetch_assoc($result);
    }

    public static function GetRentCategories() {
        $query = "SELECT * FROM rent_categoty";
        $result = mysqli_query(Database::Connect(), $query);

        $n = mysqli_num_rows($result);
        $cats = array();

        for($i=0; $i<$n; ++$i) {
            $row = mysqli_fetch_assoc($result);
            $cats[$i] = $row;
        }

        return $cats;
    }
    
    public static function GetRentById($id) {
        $query = "SELECT * FROM rent_categoty WHERE $id";
        $result = mysqli_query(Database::Connect(), $query);

        return mysqli_fetch_assoc($result);
    }

    public static function EditRentByID(array $object) {
        $id = $object['id'];
        $title = $object['title'];
        $mass = $object['mass'];
        $volume = $object['volume'];
        $depth = $object['depth'];
        $category = $object['category'];
        $image = $object['image'];

        $query = "UPDATE technic SET title='{$title}', mass='{$mass}', volume='{$volume}', depth='{$depth}', category='{$category}', image='{$image}' WHERE id='{$id}'";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }

    public static function RemoveRent($id) {
        $query = "DELETE FROM technic WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }
}