<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 13:42
 */
class Object_Service {

    public static function GetAllObjects() {
        $query = "SELECT * FROM objects";
        $result = mysqli_query(Database::Connect(), $query) or die('Error: '.mysqli_error(Database::Connect()));

        $n = mysqli_num_rows($result);
        $objects = array();

        for($i=0; $i<$n; ++$i) {
            $object = mysqli_fetch_assoc($result);
            $objects[$i] = $object;
        }

        return $objects;
    }

    public static function GetObjectById($id) {
        $query = "SELECT * FROM objects WHERE id=$id";
        $result = mysqli_query(Database::Connect(), $query) or die('Error: '.mysqli_error(Database::Connect()));

        return mysqli_fetch_assoc($result);
    }

    public static function  EditObjectByID(array $object) {
        $query = "UPDATE objects SET title='{$object['title']}'";
        $query .= ", location='{$object['location']}'";
        $query .= ", description='{$object['description']}'";
        $query .= ", built='{$object['built']}'";
        $query .= ", company_id='{$object['company']}'";
        $query .= ", image_id='{$object['image']}' WHERE id='{$object['id']}'";
        $result = mysqli_query(Database::Connect(), $query);


        return $result;
    }

    public static function RemoveObjectById($id){
        $query = "DELETE FROM objects WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }

    public static function AddNewObject($object) {
        $title = $object['title'];
        $location = $object['location'];
        $description = $object['description'];
        $built = $object['built'];
        $company = $object['company_id'];
        $image = $object['image_id'];

        $query = "INSERT INTO objects(title, location, description, built, company_id, image_id) VALUES('$title', '$location', '$description', '$built', '$company', '$image')";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }

}