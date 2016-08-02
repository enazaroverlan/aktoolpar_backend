<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 31.07.2016
 * Time: 22:18
 */

$id = preg_split('/\\//', $_SERVER['REQUEST_URI'])[4];
$user = User_Service::GetUserByID($id);
?>

<div class="objects_edit_page">
    <form class="form-horizontal" role="form" method="post" action="<?=URL_PREFIX.'/admin/user_edit'?>">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" value="<?=$user['id']?>" readonly disabled>
                <input type="hidden" name="id" value="<?=$user['id']?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Логин</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="Наименование" value="<?=$user['login']?>" name="login" />
            </div>
        </div>
        <div class="form-group">
            <label for="location" class="col-sm-2 control-label">Пароль</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="location" placeholder="Если вы оставите поле пустым, то пароль останется таким же" value=""
                       name="password"/>
            </div>
        </div>
        <div class="form-group">
            <label for="volume" class="col-sm-2 control-label">Права</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="volume" name="role" value="<?=$user['role']?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
</div>
