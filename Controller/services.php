<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 20:23
 */
class services {
    public function index_action() {

    }

    public function rent() {

    }

    public function edit_rent() {
        if(!Security::GetStatus()['isAuth'] || Security::GetStatus()['role'] != 'admin') {
            header('Location: '.URL_PREFIX.'/admin');
        } else {
            $object = array(
                'id' => $_REQUEST['id'],
                'title' => $_REQUEST['title'],
                'mass' => $_REQUEST['mass'],
                'volume' => $_REQUEST['volume'],
                'depth' => $_REQUEST['depth'],
                'category' => $_REQUEST['category'],
                'image' => $_REQUEST['image_id']
            );

            Rent_Service::EditRentByID($object);
            header('Location: '.URL_PREFIX.'/admin/rent');
        }
    }

}