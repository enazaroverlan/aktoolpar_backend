<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 02.08.2016
 * Time: 6:50
 */

?>
<div class="objects_edit_page">
    <form class="form-horizontal" role="form" method="POST" action="<?=URL_PREFIX.'/service/add_rent'?>">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Наименование</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="Наименование" value="" name="title">
            </div>
        </div>
        <div class="form-group">
            <label for="mass" class="col-sm-2 control-label">Эксплутационная масса, кг:</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="mass" placeholder="Эксплутационная масса" value="" name="mass">
            </div>
        </div>
        <div class="form-group">
            <label for="volume" class="col-sm-2 control-label">Объём ковша, куб. м:</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="volume" placeholder="Объём ковша" value="" name="volume" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Глубина копания, мм</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="depth" placeholder="Глубина копания" value="" name="depth" />
            </div>
        </div>
        <div class="form-control">
            <label class="col-sm-2 control-label">Категоря</label>

            <div class="col-sm-10">

            </div>
        </div>
    </form>
</div>
