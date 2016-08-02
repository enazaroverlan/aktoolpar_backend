<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 01.08.2016
 * Time: 3:46
 */

$media = Media_Service::GetFullMedia();
?>
<div class="modal fade" id="add_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Загрузить картинку</h4>
            </div>
            <form enctype="multipart/form-data" action="<?=URL_PREFIX.'/admin/add_media'?>" method="POST">
            <div class="modal-body">
                <input type="file" name="image" multiple accept="image/*,image/jpeg" />

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php if(isset($_REQUEST['message'])): ?>
    <div class="alert alert-danger fade in">
        <button type="button" data-dismiss="alert" class="close" aria-hidden="true">&times;</button>
        <?=$_REQUEST['message']?>
    </div>
<?php endif; ?>
<div style="width: 650px; margin: 50px auto;">
    <table class="table table-hover">
        <thead>
        <tr>
            <td>#</td>
            <td>Ссылка</td>
            <td>Предосмотр</td>
            <td>Действия</td>
        </tr>
        </thead>
        <tbody>
        <?php if($media != null): ?>
            <?php foreach ($media as $key => $object): ?>
                <tr>
                    <td><?= $object['id'] ?></td>
                    <td><?= $object['link'] ?></td>
                    <td><img src="<?=$object['link']?>" width="200" /></td>
                    <td><a href="<?= URL_PREFIX . '/admin/remove_media/?id=' . $object['id'] ?>" class="btn btn-primary">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="9"><button class="btn btn-primary" data-toggle="modal" data-target="#add_image">+ Добавить</button></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="9">Медия пуста, <button class="btn btn-primary" data-toggle="modal" data-target="#add_image">+ Добавить</button></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</div>
