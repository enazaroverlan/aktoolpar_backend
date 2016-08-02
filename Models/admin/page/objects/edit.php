<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 01.08.2016
 * Time: 3:48
 */


$id = preg_split('/\\//', $_SERVER['REQUEST_URI'])[sizeof(preg_split('/\\//', $_SERVER['REQUEST_URI'])) - 1];

$object = Object_Service::GetObjectById($id);

?>
<div class="objects_edit_page">
    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="<?=URL_PREFIX.'/objects/edit_object/'?>">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>

            <div class="col-sm-10">
                <input type="text" name="id" class="form-control" value="<?=$object['id']?>" id="id" readonly disabled />
                <input type="hidden" name="id" value="<?=$object['id']?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Наименование</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="Наименование" value="<?=$object['title']?>" name="title" required />
            </div>
        </div>
        <div class="form-group">
            <label for="location" class="col-sm-2 control-label">Местоположение</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="location" placeholder="Местоположение" value="<?=$object['location']?>" name="location" required />
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Описание</label>

            <div class="col-sm-10">
                <textarea class="form-control" rows="3" id="description" name="description" required><?=$object['description']?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Статус(Построен?)</label>

            <div class="col-sm-10">
                <input type="radio" name="built" value="yes" id="status" <?php if($object['built'] == 'yes') { echo('checked'); } ?> />Да<br />
                <input type="radio" name="built" value="no" id="status" <?php if($object['built'] == 'no') { echo('checked'); } ?> />Нет
            </div>
        </div>
        <div class="form-group">
            <label for="company_id" class="col-sm-2 control-label">Компания</label>

            <div class="col-sm-10">
                <input type="radio" value="1" checked name="company" id="company_id" <?php if($object['company_id'] == '1') { echo('checked'); } ?> />ОсОО Ак - Тулпар<br />
                <input type="radio" value="2" name="company" id="company_id" <?php if($object['company_id'] == '2') { echo('checked'); } ?> />ОсОО Солнечный
            </div>
        </div>
        <div class="form-group">
            <label for="image_id" class="col-sm-2 control-label">Изображение</label>

            <div class="col-sm-10">
                <img src="<?=Media_Service::GetMediaByID($object['image_id'])['link']?>" width="300" />
                <input type="file" accept="image/*,image/jpeg" class="form-control" name="new_image" id="image_id" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
</div>
