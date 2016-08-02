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

    public function build() {
        return View::GetOneBuildPage();
    }

    public function edit_object() {
        if(!Security::GetStatus()['isAuth'] || Security::GetStatus()['role'] != 'admin') {
            header('Location: '.URL_PREFIX.'/');
            return false;
        } else {

            if($_FILES['new_image']['size'] > 0) {
                $direction = PROJECT_PATH.'/Public/uploads/';
                $path = URL_PREFIX.'/Public/uploads/';
                $file = basename($_FILES['new_image']['name']);

                if(is_uploaded_file($_FILES['new_image']['tmp_name'])) {
                    if(move_uploaded_file($_FILES['new_image']['tmp_name'], $direction.$file)) {
                        Media_Service::AddImage($path.$file, $direction.$file);
                        Media_Service::RemoveMediaByID(Object_Service::GetObjectById($_REQUEST['id'])['image_id']);
                        $new_image = Media_Service::GetMediaByPath($path.$file);

                        $object = array(
                            'id' => $_REQUEST['id'],
                            'title' => $_REQUEST['title'],
                            'location' => $_REQUEST['location'],
                            'description' => $_REQUEST['description'],
                            'built' => $_REQUEST['built'],
                            'company' => $_REQUEST['company'],
                            'image' => $new_image['id']
                        );

                        Object_Service::EditObjectByID($object);
                        header('Location: '.URL_PREFIX.'/admin/');
                        return true;
                    } else {
                        header('Location: '.URL_PREFIX.'/admin/?message=Не удалось загрузить картинку');
                        return false;
                    }
                } else {
                    header('Location: '.URL_PREFIX.'/admin/?message=Не удалось загрузить картинку');
                    return false;
                }
            } else {
                $object = array(
                    'id' => $_REQUEST['id'],
                    'title' => $_REQUEST['title'],
                    'location' => $_REQUEST['location'],
                    'description' => $_REQUEST['description'],
                    'built' => $_REQUEST['built'],
                    'company' => $_REQUEST['company'],
                    'image' => $_REQUEST['image']
                );

                Object_Service::EditObjectByID($object);
                header('Location: '.URL_PREFIX.'/admin/');
                return true;
            }


        }

//        echo(json_encode(array(
//            '$_REQUEST' => $_REQUEST,
//            '$_FILES' => $_FILES
//        )));
    }

    public function remove_object() {
        if(!Security::GetStatus()['isAuth'] || Security::GetStatus()['role'] != 'admin') {
            header('Location: '.URL_PREFIX.'/');
            return false;
        } else {
            Media_Service::RemoveMediaByID(Object_Service::GetObjectById($_REQUEST['id']['image_id']));
            Object_Service::RemoveObjectById($_REQUEST['id']);
            header('Location: '.URL_PREFIX.'/admin/');
            return true;
        }
    }

    public function add_object() {
        if(!Security::GetStatus()['isAuth'] || Security::GetStatus()['role'] != 'admin') {
            header('Location: '.URL_PREFIX.'/admin');
            return false;
        } else {
            if($_FILES['image']['size'] > 0) {
                $direction = PROJECT_PATH.'/Public/uploads/';
                $path = URL_PREFIX.'/Public/uploads/';
                $file = basename($_FILES['image']['name']);


                if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $direction.$file)) {
                        Media_Service::AddImage($path.$file, $direction.$file);
                        $new_image = Media_Service::GetMediaByPath($path.$file);

                        $object = array(
                            'title' => $_REQUEST['title'],
                            'location' => $_REQUEST['location'],
                            'description' => $_REQUEST['description'],
                            'built' => $_REQUEST['built'],
                            'company_id' => $_REQUEST['company'],
                            'image_id' => $new_image['id']
                        );
                        Object_Service::AddNewObject($object);
                        header('Location: '.URL_PREFIX.'/admin/');
                        return true;
                    } else {
                        header('Location: '.URL_PREFIX.'/admin/?message=Не удалось загрузить картинку');
                        return false;
                    }
                } else {
                    header('Location: '.URL_PREFIX.'/admin/?message=Не удалось загрузить картинку');
                    return false;
                }
            } else {
                header('Location: '.URL_PREFIX.'/admin/object_add/?message=Вы не выбрали картинку');
                return false;
            }
        }
    }
}