<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 02.08.2016
 * Time: 5:40
 */

?>
<div class="objects_edit_page">
    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="<?=URL_PREFIX.'/objects/add_object'?>">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Наименование</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="Наименование" value="" name="title" required />
            </div>
        </div>
        <div class="form-group">
            <label for="location" class="col-sm-2 control-label">Местоположение</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="location" placeholder="Местоположение" value="" name="location" required />
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Описание</label>

            <div class="col-sm-10">
                <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Статус(Построен?)</label>

            <div class="col-sm-10">
                <input type="radio" name="built" value="yes" checked id="status" />Да<br />
                <input type="radio" name="built" value="no" id="status" />Нет
            </div>
        </div>
        <div class="form-group">
            <label for="company_id" class="col-sm-2 control-label">Компания</label>

            <div class="col-sm-10">
                <input type="radio" value="1" checked name="company" id="company_id" />ОсОО Ак - Тулпар<br />
                <input type="radio" value="2" name="company" id="company_id" />ОсОО Солнечный
            </div>
        </div>
        <div class="form-group">
            <label for="image_id" class="col-sm-2 control-label">Изображение</label>

            <div class="col-sm-10">
                <input type="file" accept="image/*,image/jpeg" class="form-control" name="image" id="image_id" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </form>
</div>
</div>
