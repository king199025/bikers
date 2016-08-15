<?php foreach ($clubs as $item): ?>
    <div class="motoclub-content-promo-item">
        <a href="<?= \yii\helpers\Url::to(['/clubs/default/view', 'id' => $item->id]) ?>" class="motoclub-content-promo-pic">
            <img src="/<?= $item->promo ?>" alt="">
        </a>
        <a href="<?= \yii\helpers\Url::to(['/clubs/default/view', 'id' => $item->id]) ?>" class="button button_orange events-conrent__item_price"><?= $item->name ?>, 66RUS</a>
    </div>
<?php endforeach; ?>