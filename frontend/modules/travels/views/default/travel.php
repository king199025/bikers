<p>Название: <?=$travel->name?></p>
<p>Начальный город: <?=$cityStart->Name?></p>
<p>Конечный город: <?=$cityEnd->Name?></p>
<p>Дата выезда: <?=$travel->dt_start?></p>
<p>Мотоцикл: <?=$moto->car_mark->name." ".$moto->car_model->name?></p>
<?php if(!empty($route)):?>
<p>Промежуточные города:</p>
<?php endif; ?>
<?php foreach($route as $item):?>
    <p><?=$item->Name?></p>
    <p><input type="hidden" class="ajaxCityDot" value="<?=$item->ID?>"></p>
<?php endforeach; ?>
    <input type="hidden" id="travel-city_start" value="<?=$travel->city_start?>">
    <input type="hidden" id="travel-city_end" value="<?=$travel->city_end?>">
<button id="add_travel_to_bookmarks" data-travel="<?=$travel->id?>" class="button button_orange button_travels">В закладки</button>