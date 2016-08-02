<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 20:18
 */

$objects = Certificates_Service::GetAllCertificates();

?>

<div class="rent_page">
    <table class="table table-hover">
        <thead>
        <tr>
            <td>#</td>
            <td>Изображение</td>
            <td>Компания</td>
            <td>Действия</td>
            <td><a href="<?=URL_PREFIX.'/admin/add_certificate'?>" class="btn btn-primary">+ Добавить</a></td>
        </tr>
        </thead>
        <tbody>
        <?php if($objects != null): ?>
            <?php foreach ($objects as $key => $object): ?>
                <tr>
                    <td><?= $object['id'] ?></td>
                    <td><img src="<?= Media_Service::GetMediaByID($object['image'])['link']; ?>" width="100" /></td>
                    <td><?= Company_Service::GetCompanyByID($object['company'])['name'] ?></td>
                    <td><a href="<?= URL_PREFIX . '/admin/edit_certificate/' . $object['id'] ?>">Редактировать</a></td>
                    <td><a href="<?= URL_PREFIX . '/admin/remove_certificate/?id=' . $object['id'] ?>">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="9"><a href="<?=URL_PREFIX.'/admin/add_certificate'?>" class="btn btn-primary">+ Добавить</a></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="9">Ещё нет Сертификатов <a href="<?=URL_PREFIX.'/admin/add_certificate'?>" class="btn btn-primary">+ Добавить</a></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</div>