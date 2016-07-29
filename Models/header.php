<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 18.07.2016
 * Time: 16:56
 */

$routing = Routing::getInstance();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$routing->GetPageTitle()?> | Ак - Тулпар</title>
    <link rel="shortcut icon" href="<?=FAVICON_PATH?>" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?=BOOTSTRAP_CSS_PATH?>"/>
    <link rel="stylesheet" type="text/css" href="<?=STYLE_PATH?>"/>
    <script src="<?=JQUERY_PATH?>"></script>
    <script src="<?=BOOTSTRAP_JS_PATH?>"></script>
</head>
<body>
<!-- ======================== Header ============================-->
<div class="top_nav_bar">
    <div class="nav_bar">
        <a href="#">
            <div class="main_logo">

            </div>
        </a>

        <div class="nav_menu">
            <ul class="nav_menu_ul">
                <a href="<?=URL_PREFIX.'/'?>" class="toolpar_links">
                    <li class="nav_menu_li <?php if($routing->GetLocation() == 'main'): ?>nav_menu_active<?php endif; ?>">ГЛАВНАЯ</li>
                </a>
                <a href="<?=URL_PREFIX.'/about'?>" class="toolpar_links">
                    <li class="nav_menu_li <?php if($routing->GetLocation() == 'about'): ?>nav_menu_active<?php endif; ?>">О НАС</li>
                </a>
                <li class="nav_menu_li <?php if($routing->GetLocation() == 'objects'): ?>nav_menu_active<?php endif; ?>">
                    ОБЪЕКТЫ
                    <ul class="submenu">
                        <li><a href="<?=URL_PREFIX.'/objects/built'?>">Построенные</a></li>
                        <li><a href="<?=URL_PREFIX.'/objects/building'?>">Строящиеся</a></li>
                        <li><a href="<?=URL_PREFIX.'/objects/projected'?>">Проектирумые</a></li>
                    </ul>
                </li>
                <li class="nav_menu_li <?php if($routing->GetLocation() == 'services'): ?>nav_menu_active<?php endif; ?>">
                    УСЛУГИ
                    <ul class="submenu">
                        <li><a href="<?=URL_PREFIX.'/services/building'?>">Строительство</a></li>
                        <li><a href="<?=URL_PREFIX.'/services/rent'?>">Аренда техники</a></li>
                        <li><a href="<?=URL_PREFIX.'/services/design'?>">Проектирование</a></li>
                    </ul>
                </li>
                <a href="<?=URL_PREFIX.'/contacts'?>" class="toolpar_links">
                    <li class="nav_menu_li <?php if($routing->GetLocation() == 'contacts'): ?>nav_menu_active<?php endif; ?>">КОНТАКТЫ</li>
                </a>
            </ul>
        </div>
    </div>
</div>
