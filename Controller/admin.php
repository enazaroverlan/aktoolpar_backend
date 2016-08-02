<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 13:21
 */
class admin {

    public function index_action() {
        if(!Security::GetStatus()['isAuth']) {
            return View::GetLoginPage();
        } else {
            return View::GetObjectsPage();
        }
    }

    public function edit_object() {
        if(!Security::GetStatus()['isAuth']){
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            return View::GetObjectEditPage();
        }
    }

    public function add_object() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
        } else {
            return View::GetObjectAddPage();
        }
    }

    public function remove_object() {
        if(!Security::GetStatus()['isAuth']){
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            Object_Service::RemoveObjectById($_REQUEST['id']);
            header('Location: '.URL_PREFIX.'/admin');
            return true;
        }
    }

    public function rent() {
        if(!Security::GetStatus()['isAuth']){
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            return View::GetRentDashboard();
        }
    }

    public function edit_rent() {
        if(!Security::GetStatus()['isAuth']){
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            return View::GetRentEditPage();
        }
    }

    public function remove_rent() {
        if(!Security::GetStatus()['isAuth'] && Security::GetStatus()['role'] != 'admin') {
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            Rent_Service::RemoveRent($_REQUEST['id']);
            header('Location: '.URL_PREFIX.'/admin/rent');
            return true;
        }
    }

    public function certificates() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            return View::GetCertificatesPage();
        }
    }

    public function edit_certificate() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            return View::GetCertificatesEditPage();
        }
    }

    public function certificate_edit() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return false;
        } else {
           if($_FILES['new_image']['size'] > 0) {
               $direction = PROJECT_PATH."/Public/uploads/";
               $path = URL_PREFIX.'/Public/uploads/';
               $file = basename($_FILES['new_image']['name']);

               if(is_uploaded_file($_FILES['new_image']['tmp_name'])) {
                   if(move_uploaded_file($_FILES['new_image']['tmp_name'], $direction.$file)) {
                       Media_Service::AddImage($path.$file, $direction.$file);
                       $current_image = Media_Service::GetMediaByPath($path.$file);
                       $certificate = array(
                           'id' => $_REQUEST['id'],
                           'image' => $current_image['id'],
                           'company' => $_REQUEST['company']
                       );
                       Certificates_Service::EditCertificate($certificate);
                       header('Location: '.URL_PREFIX.'/admin/certificates');
                       return true;
                   } else {
                       header('Location: '.URL_PREFIX.'/admin/certificates/?message=Не удалось загрузить файл');
                       return false;
                   }
               } else {
                   header('Location: '.URL_PREFIX.'/admin/certificates/?message=Не удалось загрузить файл');
                   return false;
               }
           } else {
               $certificate = array(
                   'id' => $_REQUEST['id'],
                   'image' => $_REQUEST['image'],
                   'company' => $_REQUEST['company']
               );
               Certificates_Service::EditCertificate($certificate);
               header('Location: '.URL_PREFIX.'/admin/certificates');
               return true;
           }
        }
    }

    public function add_certificate() {
        if(Security::GetStatus()['isAuth']) {
            return View::GetCertificatesAddPage();
        } else {
            header('Location: '.URL_PREFIX.'/admin/certificates');
            return null;
        }
    }

    public function certificate_add() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return false;
        } else {
            $direction = PROJECT_PATH.'/Public/uploads/';
            $path = URL_PREFIX.'/Public/uploads/';
            $file = basename($_FILES['image']['name']);

            if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                if(move_uploaded_file($_FILES['image']['tmp_name'], $direction.$file)) {
                    Media_Service::AddImage($path.$file, $direction.$file);
                    $image = Media_Service::GetMediaByPath($path.$file);
                    $certificate = array(
                        'image' => $image['id'],
                        'company' => $_REQUEST['company']
                    );
                    Certificates_Service::AddCertificate($certificate);
//                    echo('Success');
//                    die;
                    header('Location: '.URL_PREFIX.'/admin/certificates');
                    return true;
                } else {
//                    echo('Error: Failed to move file');
//                    die;
                    header('Location: '.URL_PREFIX.'/admin/certificates/?message=Не удалось загрузить файл');
                    return false;
                }
            } else {
//                echo('Error: Failed to upload file');
//                die;
                header('Location: '.URL_PREFIX.'/admin/certificates/?message=Не удалось загрузить файл');
                return false;
            }
        }
    }

    public function remove_certificate() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return false;
        } else {
            $id = $_REQUEST['id'];
            Media_Service::RemoveMediaByID(Certificates_Service::GetCertificateByID($id)['image']);
            Certificates_Service::RemoveCertificate($id);
            header('Location: '.URL_PREFIX.'/admin/certificates');
            return true;
        }
    }

    public function users() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            return View::GetUsersDashboard();
        }
    }

    public function edit_user() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            return View::GetUserEditPage();
        }
    }

    public function user_edit() {
        if(!Security::GetStatus()['isAuth'] && Security::GetStatus()['role'] != 'admin') {
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        } else {
            if($_REQUEST['password'] == "") {
                $user = array(
                    'id' => $_REQUEST['id'],
                    'login' => $_REQUEST['login'],
                    'role' => $_REQUEST['role']
                );
                User_Service::EditUserWithoutPassword($user);
            } else {
                $user = array(
                    'id' => $_REQUEST['id'],
                    'login' => $_REQUEST['login'],
                    'password' => $_REQUEST['password'],
                    'role' => $_REQUEST['role']
                );
                User_Service::EditUser($user);
            }
            header('Location: '.URL_PREFIX.'/admin/users');
            return true;
        }
    }

    public function media() {
        if(Security::GetStatus()['isAuth']) {
            return View::GetMediaDashboard();
        } else {
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        }
    }

    public function edit_media() {
        if(Security::GetStatus()['isAuth']) {
            return View::GetMediaEditPage();
        } else {
            header('Location: '.URL_PREFIX.'/admin');
            return null;
        }
    }

    public function add_media() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return false;
        } else {
            $direction = PROJECT_PATH.'/Public/uploads/';
            $path = URL_PREFIX.'/Public/uploads/';
            $file = $direction . basename($_FILES['image']['name']);

            if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                    Media_Service::AddImage($path . basename($_FILES['image']['name']), $file);
                    header('Location: '.URL_PREFIX.'/admin/media');
                    return true;
                } else {
                    header('Location: '.URL_PREFIX.'/admin/media/?message=Не удалось загрузить файл');
                    return false;
                }
            } else {
                header('Location: '.URL_PREFIX.'/admin/media/?message=Не удалось загрузить файл');
                return false;
            }
        }
    }

    public function remove_media() {
        if(!Security::GetStatus()['isAuth']) {
            header('Location: '.URL_PREFIX.'/admin');
            return false;
        } else {
            $path = preg_split('/\\//', Media_Service::GetMediaByID($_REQUEST['id'])['apache_dir']);
            $direction = $path[sizeof($path) - 1];

            if(unlink(PROJECT_PATH.'/Public/uploads/'.$direction)) {
                Media_Service::RemoveMediaByID($_REQUEST['id']);
                header('Location: '.URL_PREFIX.'/admin/media/');
                return true;
            } else {
                header('Location: '.URL_PREFIX.'/admin/media/');
                return false;
            }
        }
    }
}