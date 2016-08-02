<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 23:09
 */

$id = preg_split('/\\//', $_SERVER['REQUEST_URI'])[4];
$object = Object_Service::GetObjectById($id);

$alObjects = Object_Service::GetAllObjects();
?>
<div class="header_image image_1">
    <div class="page_title">
        ЖИЛОЙ КОМПЛЕКС
        УЛАН-2
    </div>
</div>

<div class="page_body">
    <div class="side_bar">
        <ul>

            <?php foreach($alObjects as $key=>$element): ?>

                <?php if($element['company_id'] == $object['company_id']): ?>
                    <a href="<?= URL_PREFIX.'/objects/build/'.$element['id'] ?>">
                        <li>
                            <div class="side_bar_hover">
                                <div class="side_bar_info">
                                    <?=$element['title']?>
                                </div>
                            </div>
                            <img src="<?= Media_Service::GetMediaByID($element['image_id'])['link'] ?>" width="240" height="150"/>
                        </li>
                    </a>
                <?php endif; ?>

            <?php endforeach; ?>
        </ul>
    </div>
    <div class="page_content">
        <div class="object_title">
            <?= $object['title'] ?>
        </div>
        <div class="object_location">
            <img src="<?= URL_PREFIX.'/Public/IMAGES/place.png' ?>"/> <?=$object['location']?>
        </div>
        <div class="object_content">
            <div class="object_description">
                <div class="description_title">Описание</div>
                <div class="description_text">
                    <?=$object['description']?>
                </div>
            </div>
            <div class="object_images">
                <div class="show_plane">
                    <img src="<?=URL_PREFIX.'/Public/IMAGES/screpka.png'?>"/>
                    Показать<br/>
                    Генплан
                </div>
                <div class="image_wrap">
                    <div class="slider_main_image">
                        <img src="<?=URL_PREFIX.'/Public/IMAGES/slider/body_slider.png'?>" width="453px" height="264px"/>
                    </div>
<!--                    <div class="slider_pagination">-->
<!--                        <ul>-->
<!--                            <li class="add-margin-25"></li>-->
<!--                            <li class="add-margin-25"></li>-->
<!--                            <li class="add-margin-25"></li>-->
<!--                            <li></li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
        <div class="object_planing">
            <div class="object_planing_tabs">
                <div class="entrance-1 entrance_active">
                    ПЛАНИРОВКА ПОДЪЕЗДА №1
                </div>
                <div class="entrance-2">
                    ПЛАНИРОВКА ПОДЪЕЗДА №2
                </div>
                <div class="ent-1" id="ent1">
                    <img src="<?=URL_PREFIX.'/Public/IMAGES/3-2-2.PNG'?>" usemap="#my_map" width="740px" height="460px"/>
                    <map name="my_map">
                        <area class="own_area" href="#" shape="poly"
                              coords="8,0 , 250,0 , 250,45 , 373,45 , 373,115 , 313,115 , 313,227 , 246,227 , 246,410 , 250,410 , 250,460 , 5,460 , 5,410 , 0,410  , 0,50 , 8,50"/>
                        <area class="own_area" href="#" shape="poly"
                              coords="490,4 , 734,4 , 734,50 , 739,50 , 739,410 , 735,460 , 613,460 , 613,227 , 488,227 , 488,55 , 490,55"/>
                        <area class="own_area" href="#" shape="poly"
                              coords="614,227 , 614,460 , 250,460 , 250,410 , 246,410 , 246,227"/>
                    </map>
                </div>
                <div class="ent-2" id="ent2">
                    <img src="<?=URL_PREFIX.'/Public/IMAGES/3-1-2.png'?>" width="740px" height="460px"/>
                </div>
            </div>
        </div>
        <div class="object_flats">
            <div class="object_flats_title">
                ВИЗУАЛИЗАЦИЯ КВАРТИР
            </div>
            <ul>
                <li><img src="<?=URL_PREFIX.'/Public/IMAGES/render/render1.png'?>"/><br/>
                    2х комнатная квартира<br/>
                    <span>Площадь: 79,90 м²</span>
                </li>
                <li><img src="<?=URL_PREFIX.'/Public/IMAGES/render/render2.png'?>"/><br/>
                    1 комнатная квартира<br/>
                    <span>Площадь: 44,80 м²</span>
                </li>
                <li><img src="<?=URL_PREFIX.'/Public/IMAGES/render/render3.png'?>"/><br/>
                    1 комнатная квартира<br/>
                    <span>Площадь: 44,80 м²</span>
                </li>
                <li><img src="<?=URL_PREFIX.'/Public/IMAGES/render/render4.png'?>"/><br/>
                    2х комнатная квартира<br/>
                    <span>Площадь: 67,20 м²</span>
                </li>
            </ul>
        </div>

        <script>
            //====================== Vars ===========================
            var entBtn1 = '.entrance-1';
            var entBtn2 = '.entrance-2';

            var ent1Block = '#ent1';
            var ent2Block = '#ent2';
            //====================== End Var ========================
            $(entBtn1).on('click', function () {
                if (!$(entBtn1).hasClass('entrance_active')) {
                    $(entBtn2).removeClass('entrance_active');
                    $(entBtn1).addClass('entrance_active');
                    $(ent2Block).animate({
                        opacity: 0
                    }, 200, function () {
                        $(ent2Block).fadeOut('fast', function () {
                            $(ent1Block).fadeIn('fast');
                            $(ent1Block).animate({
                                opacity: 1
                            }, 200);
                        });
                    });
                }
            });

            $(entBtn2).on('click', function () {
                if (!$(entBtn2).hasClass('entrance_active')) {
                    $(entBtn1).removeClass('entrance_active');
                    $(entBtn2).addClass('entrance_active');
                    $(ent1Block).animate({
                        opacity: 0
                    }, 200, function () {
                        $(ent1Block).fadeOut('fast', function () {
                            $(ent2Block).fadeIn('fast');
                            $(ent2Block).animate({
                                opacity: 1
                            }, 200);
                        });

                    });
                }
            });
        </script>
