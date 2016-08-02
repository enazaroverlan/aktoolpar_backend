<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 31.07.2016
 * Time: 19:53
 */
class Certificates_Service {

    public static function GetAllCertificates() {
        $query = "SELECT * FROM certificates";
        $result = mysqli_query(Database::Connect(), $query);

        $n = mysqli_num_rows($result);
        $certificate = array();

        for($i=0; $i < $n; ++$i) {
            $row = mysqli_fetch_assoc($result);
            $certificate[$i] = $row;
        }

        return $certificate;
    }

    public static function GetCertificateByID($id) {
        $query = "SELECT * FROM certificates WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return mysqli_fetch_assoc($result);
    }

    public static function EditCertificate(array $certificate) {
        $id = $certificate['id'];
        $image = $certificate['image'];
        $company = $certificate['company'];

        $query = "UPDATE certificates SET image='$image', company='$company' WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }

    public static function AddCertificate(array $certificate) {
        $image = $certificate['image'];
        $company = $certificate['company'];

        $query = "INSERT INTO certificates(image, company) VALUES ('$image', '$company')";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }

    public static function RemoveCertificate($id) {
        $query = "DELETE FROM certificates WHERE id='$id'";
        $result = mysqli_query(Database::Connect(), $query);

        return $result;
    }
}