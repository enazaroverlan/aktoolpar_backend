<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 20:19
 */
class Media_Service {
    public static function GetFullMedia() {
        $query = "SELECT * FROM media";
        $result = mysqli_query(Database::Connect(), $query);

        $n = mysqli_num_rows($result);
        $media = array();

        for($i=0; $i<$n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $media[$i] = $row;
        }

        return $media;
    }

    public static function GetMediaByID($id) {
        $query = "SELECT * FROM media WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return mysqli_fetch_assoc($result);
    }

    public static function GetMediaByPath($path) {
        $query = "SELECT * FROM media WHERE link='$path'";
        $result = mysqli_query(Database::Connect(), $query);

        return mysqli_fetch_assoc($result);
    }

    public static function RemoveMediaByID($id) {
        $query = "DELETE FROM media WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }

    public static function AddImage($direction, $apache) {
        $query = "INSERT INTO media (link, apache_dir) VALUE ('$direction', '$apache')";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }
}