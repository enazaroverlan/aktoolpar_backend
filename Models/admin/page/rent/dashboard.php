<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 19:07
 */

$objects = Rent_Service::GetAllRentEl();
?>
<div class="rent_page">
    <table class="table table-hover">
        <thead>
        <tr>
            <td>#</td>
            <td>Нименование</td>
            <td>Эксплуатационная масса, кг</td>
            <td>Объем ковша, м.куб</td>
            <td>Глубина копания, мм</td>
            <td>Категория</td>
            <td>Предосмотр</td>
            <td>Действия</td>
            <td><a href="<?=URL_PREFIX.'/admin/add_rent'?>" class="btn btn-primary">Добавить</a></td>
        </tr>
        </thead>
        <tbody>
        <?php if($objects != null): ?>
            <?php foreach ($objects as $key => $object): ?>
                <tr>
                    <td><?= $object['id'] ?></td>
                    <td><?= $object['title'] ?></td>
                    <td><?= $object['mass'] ?></td>
                    <td><?= $object['volume'] ?></td>
                    <td><?= $object['depth'] ?></td>
                    <td><?= Rent_Service::GetRentById($object['category'])['name'] ?></td>
                    <td><img src="<?= $object['image'] ?>" width="200" /></td>
                    <td><a href="<?= URL_PREFIX . '/admin/edit_rent/' . $object['id'] ?>">Редактировать</a></td>
                    <td><a href="<?= URL_PREFIX . '/admin/remove_rent/?id=' . $object['id'] ?>">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="9"><a href="<?=URL_PREFIX.'/admin/add_rent'?>" class="btn btn-primary">Добавить</a></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="9">Ещё нет техники <a href="<?=URL_PREFIX.'/admin/add_rent'?>" class="btn btn-primary">Добавить</a></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</div>
