<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 29.07.2016
 * Time: 13:34
 */
?>
<div class="pre-footer"></div>
<!-- ======================== Footer ============================-->
<div class="footer">
    <div class="footer_background">

    </div>
    <div class="footer_contacts">
        <div class="footer_logo">
            <img src="<?=IMAGES_PATH.'/footer_logo.png'?>"/>
        </div>
        <div class="footer_contact">
            <div>Контакты</div>
            + 996 312 90 03 15<br/>
            + 996 770 53 50 03<br/>
            + 996 770 53 50 08
        </div>
        <div class="footer_address">
            <span>НАШ АДРЕС</span> <br/>
            <br/>
            Кыргызская Республика, 720083<br/>
            г. Бишкек, ул. Шабдан Баатыра 2<br/>
            (микрорайон Кок-Жар)<br/>
            <br/>
            E-mail: <a href="mailto:aktulpar2014@yandex.ru" target="_blank">aktulpar2014@yandex.ru</a>
        </div>
    </div>
</div>
<!-- ======================== End Footer ========================-->
</div>
<!-- ======================== End Body ==========================-->


</body>
</html>
<script>
    var drop_lists = $('.car_machine_hover');


    $(drop_lists).on('click', function (e) {
        if ($(this).attr('drop-toggle') != 'opened') {
            $.each($(drop_lists), function () {
                if ($(this).hasClass('car_machine_active')) {
                    $(this).removeClass('car_machine_active');
                }
                $($(this).attr('drop-target')).fadeOut('fast');
            });
            if (!$(this).hasClass('car_machine_active')) {
                $(this).addClass('car_machine_active');
            }
            $($(this).attr('drop-target')).fadeIn('slow');
            $(this).attr('drop-toggle', 'opened');
        } else {
            if ($(this).hasClass('car_machine_active')) {
                $(this).removeClass('car_machine_active');
            }
            $($(this).attr('drop-target')).fadeOut('slow');
            $(this).attr('drop-toggle', 'closed');
        }
    });
</script>
