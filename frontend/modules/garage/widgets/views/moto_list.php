<?php foreach ($moto as $item): ?>
<div class="moto-photo">
    <img src="img/moto.png" alt="moto">
</div>
<div class="bike-info">
    <p class="model">Модель <span><?=$item->car_model->name?></span></p>
    <p class="make">Марка <span><?=$item->car_mark->name?></span></p>
    <p class="power-engine">Мощность двигателя <span><?=$item->volume?></span></p>
    <p class="active-bike"><span>Байк действующий</span></p>
</div>
<? endforeach; ?>