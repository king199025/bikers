<?php if(!empty($events)):?>

    <?php foreach($events as $item): ?>
        <!-- open .events-conrent__item -->
        <div class="events-conrent__item">
            <!-- open .events-conrent__item_thumb -->
            <a href="<?=\yii\helpers\Url::to(['view','id'=>$item->id])?>" class="events-conrent__item_thumb">
                <img src="<?= $item->afisha?>" alt="" />
                <span class="events-conrent__item_distance"><strong>2800</strong>км</span>
            </a>
            <!-- close .events-conrent__item_thumb -->
            <a href="<?= \yii\helpers\Url::to(['view','id'=>$item->id])?>" class="events-conrent__item_title"><?= $item->name; ?></a>
            <span class="events-conrent__item_date"><?= \common\classes\DataHelper::rdate('d M', $item->dt_start); ?></span>
            <a href="<?=\yii\helpers\Url::to(['view','id'=>$item->id])?>" class="button button_orange events-conrent__item_price"><?= \common\classes\EventsFunction::get_city_event($item->city); ?></a>
        </div>
        <!-- close .events-conrent__item -->
    <?php endforeach; ?>
<?php else: ?>
    <span class="orange">Поиск не дал результатов</span>
<?php endif; ?>