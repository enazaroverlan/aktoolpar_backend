<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 14:39
 */
$rout = Routing::getInstance();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Admin | Ак - Тулпар</title>
    <link rel="stylesheet" href="<?=BOOTSTRAP_CSS_PATH?>" type="text/css" />
    <link rel="stylesheet" href="<?=URL_PREFIX.'/Public/CSS/admin_style.css'?>" type="text/css" />
    <link rel="shortcut icon" href="<?=FAVICON_PATH?>" type="image/x-icon">
    <script src="<?=JQUERY_PATH?>"></script>
    <script src="<?=BOOTSTRAP_JS_PATH?>"></script>
</head>
<body>
<!-- ============================================================ Left Panel =============================================================-->
<div class="admin_panel">
    <?php if(Security::GetStatus()['isAuth']): ?>
    <div class="user_panel">
        <?=Security::GetStatus()['login']?>, <a href='<?=URL_PREFIX.'/admin/logout'?>'>выйти</a>
    </div>
    <ul>
        <a href="<?=URL_PREFIX.'/admin/'?>"><li <?php if($rout->GetAction() == 'index_action' || $rout->GetAction() == 'edit_object' || $rout->GetAction() == 'add_object') { echo('class="active"'); } ?> >Объекты</li></a>
        <a href="<?=URL_PREFIX.'/admin/rent'?>"><li <?php if($rout->GetAction() == 'rent' || $rout->GetAction() == 'edit_rent') { echo('class="active"'); } ?> >Аренда техники</li></a>
        <a href="<?=URL_PREFIX.'/admin/certificates'?>"><li <?php if($rout->GetAction() == 'certificates' || $rout->GetAction() == 'edit_certificate' || $rout->GetAction() == 'add_certificate') { echo('class="active"'); } ?> >Сертификаты и прочее</li></a>
        <a href="<?=URL_PREFIX.'/admin/media'?>"><li <?php if($rout->GetAction() == 'media' || $rout->GetAction() == 'edit_media') { echo('class="active"'); } ?> >Медиа</li></a>
        <a href="<?=URL_PREFIX.'/admin/users'?>"><li <?php if($rout->GetAction() == 'users' || $rout->GetAction() == 'edit_user') { echo('class="active"'); } ?> >Пользователи</li></a>
    </ul>
    <?php endif; ?>
</div>

<div class="admin_body">
<!-- =========================================================== End left Panel ==========================================================-->


