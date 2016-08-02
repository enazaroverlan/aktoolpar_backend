<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 29.07.2016
 * Time: 18:23
 */

$built_objects = Object_Service::GetAllObjects();
?>
<div class="header_image image_3">
    <div class="page_title">
        Построенные Объекты
    </div>
</div>

<div class="page_body">
    <div class="title_center_text_2 border-bottom-1">ЖИЛОЙ КОМПЛЕКС «УЛАН-2»</div>
    <div class="object_body">
        <?php foreach($built_objects as $key=>$object): ?>
            <?php if($object['company_id'] == '1'): ?>
                <div class="one_object <?php if($key % 2 == 0):?>margin-right-25<?php endif; ?> margin-bottom-25" style="background: url('<?=Media_Service::GetMediaByID($object['image_id'])['link']?>') center no-repeat; -webkit-background-size: 700px;background-size: 700px;">
                    <a href="<?=URL_PREFIX.'/objects/build/'.$object['id']?>">
                        <div class="one_object_hover">
                            <span><?=$object['title']?></span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>