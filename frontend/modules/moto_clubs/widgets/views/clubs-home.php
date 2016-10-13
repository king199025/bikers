<div class="motoclub-content-promo">
    <?php foreach($clubs as $item): ?>
        <div class="motoclub-content-promo-item">
            <a href="<?= \yii\helpers\Url::to(['/moto_clubs/moto_clubs/views'])?>" class="motoclub-content-promo-pic">
                <img src="<?= $item->logo;?>" alt="">
            </a>
            <a href="<?= \yii\helpers\Url::to(['/moto_clubs/moto_clubs/views'])?>" class="button button_orange events-conrent__item_price"><?= \common\classes\EventsFunction::get_city_event($item->city_id)?></a>
        </div>
    <?php endforeach; ?>
</div>