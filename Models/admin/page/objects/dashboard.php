<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 01.08.2016
 * Time: 3:48
 */


$objects = Object_Service::GetAllObjects();

?>
<div class="objects_page">
    <table class="table table-hover">
        <thead>
        <tr>
            <td>#</td>
            <td>Нименование</td>
            <td>Местоположение</td>
            <td>Описание</td>
            <td>Закончено</td>
            <td>Компания</td>
            <td>Изображение</td>
            <td>Действия</td>
            <td><a href="<?=URL_PREFIX.'/admin/add_object'?>" class="btn btn-primary">+ Добавить</a></td>
        </tr>
        </thead>
        <tbody>
        <?php if($objects != null): ?>
            <?php foreach($objects as $key=>$object): ?>
                <tr>
                    <td><?=$object['id']?></td>
                    <td><?=$object['title']?></td>
                    <td><?=$object['location']?></td>
                    <td><?=substr($object['description'], 0, 30)?></td>
                    <td><?php if($object['built'] == 'yes') { echo('Да'); } else { echo('Нет'); } ?></td>
                    <td><?=Company_Service::GetCompanyByID($object['company_id'])['name']?></td>
                    <td><img src="<?=Media_Service::GetMediaByID($object['image_id'])['link']?>" width="100" /></td>
                    <td><a href="<?=URL_PREFIX.'/admin/edit_object/'.$object['id']?>">Редактировать</a></td>
                    <td><a href="<?=URL_PREFIX.'/admin/remove_object/?id='.$object['id']?>">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="9"><a href="<?=URL_PREFIX.'/admin/add_object'?>" class="btn btn-primary">+ Добавить</a></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="9">Объектов ненайдено. <a href="<?=URL_PREFIX.'/admin/add_object'?>" class="btn btn-primary">+ Добавить</a></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</div>