<?php
/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 30.07.2016
 * Time: 19:56
 */
$id = preg_split('/\\//', $_SERVER['REQUEST_URI'])[4];
$object = Rent_Service::GetRentElByID($id);

$categories = Rent_Service::GetRentCategories();
?>
<div class="objects_edit_page">
    <form class="form-horizontal" role="form" method="post" action="<?=URL_PREFIX.'/services/edit_rent'?>">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" value="<?=$object['id']?>" readonly disabled>
                <input type="hidden" name="id" value="<?=$object['id']?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Наименование</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="Наименование" value="<?=$object['title']?>" name="title">
            </div>
        </div>
        <div class="form-group">
            <label for="location" class="col-sm-2 control-label">Эксплуатационная масса, кг</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="location" placeholder="Масса" value="<?=$object['mass']?>"
                       name="mass">
            </div>
        </div>
        <div class="form-group">
            <label for="volume" class="col-sm-2 control-label">Объем ковша, м.куб</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="volume" name="volume" value="<?=$object['volume']?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="depth" class="col-sm-2 control-label">Глубина копания, мм</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="depth" placeholder="Глубина" value="<?=$object['depth']?>" name="depth">
            </div>
        </div>
        <div class="form-group">
            <label for="company_id" class="col-sm-2 control-label">Категория</label>

            <div class="col-sm-10">
                <select class="form-control" id="company_id" name="category">
                    <?php foreach($categories as $cat): ?>
                        <option <?php if($object['category'] == $cat['id']) {echo "selected"; }?>><?php echo $cat['id']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="image_id" class="col-sm-2 control-label">ID картинки</label>

            <div class="col-sm-10">
                <select class="form-control" id="image_id" name="image_id">
                    <option>324</option>
                    <option>634</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
</div>
