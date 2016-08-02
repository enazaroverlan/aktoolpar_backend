<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 01.08.2016
 * Time: 16:18
 */

$media = Media_Service::GetFullMedia();
$companies = Company_Service::GetAllCompanies();
?>
<div class="objects_edit_page">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?=URL_PREFIX.'/admin/certificate_add'?>">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Изображение</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" placeholder="Местоположение" value="" name="image" accept="image/*,image/jpeg" />
            </div>
        </div>
        <div class="form-group">
            <label for="company_id" class="col-sm-2 control-label">Компания</label>

            <div class="col-sm-10">
                <input type="radio" name="company" value="1" checked id="company_id" /> Ак - Тулпар
                <input type="radio" name="company" value="2" id="company_id" /> Солнечный
            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-primary" type="submit">Добавить</button>
        </div>
    </form>
</div>