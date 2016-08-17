<?php
$this->title = 'Мотоклубы';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="motoclub-filter">
    <div class="container">
        <div class="events-calendar__control">
            <a href="#" class="events-calendar__control_link">показать все</a>
        </div>
        <?php foreach($clubTypes as $type): ?>
        <div class="events-category__item">
            <input class="clubs-category" type="checkbox" name="events-category_<?=$type->id?>" id="events-category_<?=$type->id?>">
                <label for="events-category_<?=$type->id?>">
                    <span class="events-category__item_title"><em><?=$type->name?></em></span>
                    <span class="events-category__item_marker"></span>
                </label>
        </div>
        <?php endforeach;?>
        <div class="add-button">
            <a href="#" class="button button_gray add">Добавить</a>
        </div>
        <div class="motoclub-search">
            <input type="text" name="navigation__search_box " class="navigation__search_box motoclub-search-input" placeholder="Страна, город, название">
                <a href="#" class="navigation__search_icon motoclub-search-pic">
                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 250.313 250.313"><path d="M244.186 214.604l-54.379-54.378c-.289-.289-.628-.491-.93-.76 10.7-16.231 16.945-35.66 16.945-56.554C205.822 46.075 159.747 0 102.911 0S0 46.075 0 102.911c0 56.835 46.074 102.911 102.91 102.911 20.895 0 40.323-6.245 56.554-16.945.269.301.47.64.759.929l54.38 54.38c8.169 8.168 21.413 8.168 29.583 0 8.168-8.169 8.168-21.413 0-29.582zm-141.275-44.458c-37.134 0-67.236-30.102-67.236-67.235 0-37.134 30.103-67.236 67.236-67.236 37.132 0 67.235 30.103 67.235 67.236s-30.103 67.235-67.235 67.235z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </a>
        </div>
    </div>
</section>
<section class="motoclub-content">
    <div class="container">
        <div class="motoclub-content-promo">
            <?php foreach ($clubs as $item): ?>
                <div class="motoclub-content-promo-item">
                    <a href="<?= \yii\helpers\Url::to(['/clubs/default/view', 'id' => $item->id]) ?>" class="motoclub-content-promo-pic">
                        <img src="/<?= $item->promo ?>" alt="">
                    </a>
                    <a href="<?= \yii\helpers\Url::to(['/clubs/default/view', 'id' => $item->id]) ?>" class="button button_orange events-conrent__item_price"><?= $item->name ?>, 66RUS</a>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="#" id="more-clubs" data-csrf="<?= Yii::$app->request->getCsrfToken() ?>" data-count="<?= $page; ?>" class="button button_border">ЗАГРУЗИТЬ ЕЩЕ +</a>
    </div>
</section>