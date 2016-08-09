<?php
$i=1;
//$item->car_mark->name. ' ' .$item->car_model->name
?>
<?php foreach ($moto as $item): ?>
<div class="events-category__item">
    <input type="radio" class="events-category" name="events-category<?=$i?>" id="<?=$item->id?>">
    <label for="events-category<?=$i?>">
        <span class="events-category__item_marker"></span>
        <span class="events-category__item_title"><em><?= $item->car_mark->name . ' ' . $item->car_model->name ?></em></span>
    </label>
</div>
<?php $i++; endforeach; ?>
<div class="button saveMotoId">Сохранить</div>