<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 31.07.2016
 * Time: 21:12
 */

$id = preg_split('/\\//', $_SERVER['REQUEST_URI'])[sizeof(preg_split('/\\//', $_SERVER['REQUEST_URI'])) - 1];
$object = Certificates_Service::GetCertificateByID($id);

$categories = Company_Service::GetAllCompanies();
?>
<div class="objects_edit_page">
    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="<?=URL_PREFIX.'/admin/certificate_edit'?>">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" value="<?=$object['id']?>" readonly disabled>
                <input type="hidden" name="id" value="<?=$object['id']?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="image_id" class="col-sm-2 control-label">Изображение</label>

            <div class="col-sm-10">
                <img src="<?=Media_Service::GetMediaByID($object['image'])['link']?>" width="100" />
                <input type="hidden" name="image" value="<?=$object['image']?>" />
                <input type="file" accept="image/*,image/jpeg" name="new_image" id="image_id" />
            </div>
        </div>
        <div class="form-group">
            <label for="company_id" class="col-sm-2 control-label">Принадлежность компании</label>

            <div class="col-sm-10">
                <input type="radio" name="company" value="1" id="company_id" <?php if($object['company'] == '1') { echo('checked'); } ?> />Ак - Тулпар<br />
                <input type="radio" name="company" value="2" id="company_id" <?php if($object['company'] == '2') { echo('checked'); } ?> />Солнечный
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
</div>
