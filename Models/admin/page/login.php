<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 16:29
 */

?>

<div class="admin_body">
    <div class="log_in_form">
        <form role="form" method="post" action="/toolpar/auth/login">
            <div class="form-group">
                <input type="text" class="form-control" id="login_field" placeholder="Логин" name="login">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password_field" placeholder="Пароль" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</div>


