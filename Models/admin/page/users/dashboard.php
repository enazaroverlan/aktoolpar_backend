<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 31.07.2016
 * Time: 22:11
 */

$users = User_Service::GetAllUsers();
?>

<div style="width: 650px; margin: 50px auto;">
    <table class="table table-hover">
        <thead>
        <tr>
            <td>#</td>
            <td>Логин</td>
            <td>Пароль</td>
            <td>Роль</td>
            <td colspan="2">Действия</td>
        </tr>
        </thead>
        <tbody>
        <?php if($users != null): ?>
            <?php foreach ($users as $key => $object): ?>
                <tr>
                    <td><?= $object['id'] ?></td>
                    <td><?= $object['login'] ?></td>
                    <td>Пароль зашифрован</td>
                    <td><?= $object['role'] ?></td>
                    <td><a href="<?= URL_PREFIX . '/admin/edit_user/' . $object['id'] ?>">Редактировать</a></td>
                    <td><a href="<?= URL_PREFIX . '/admin/remove_user/?id=' . $object['id'] ?>">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9">Ещё нет пользователей, <button class="btn btn-primary">+ Добавить</button></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td colspan="9"><button class="btn btn-primary">+ Добавить</button></td>
        </tr>
        </tbody>
    </table>
</div>
</div>

