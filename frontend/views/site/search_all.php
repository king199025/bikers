<?php
$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;

?>
<!-- close .breadcrubs -->


<section class="search-result">
    <div class="container">
        <?php if(!empty($travel)): ?>
            <div class="result-travels">
            <h2>путешествия</h2>
            <div class="events-conrent__box travels-tab">
                <!-- open .events-conrent__item -->
                <?php foreach ($travel as $item): ?>
                    <div class="events-conrent__item">
                        <!-- open .events-conrent__item_thumb -->
                        <a href="#" class="events-conrent__item_thumb">
                            <img src="<?= $item->icon; ?>" alt="" />
                            <span class="events-conrent__item_distance"><strong><?= $item->distance; ?></strong>км</span>
                        </a>
                        <!-- close .events-conrent__item_thumb -->
                        <a href="" class="button button_orange events-conrent__item_price"><?= date('d.m.Y', $item->dt_start)?></a>
                        <span class="events-conrent__item_title travels-item_title"><?= \common\classes\EventsFunction::get_city_event($item->city_start);?> - <?= \common\classes\EventsFunction::get_city_event($item->city_end);?></span>
                    </div>
                <?php endforeach; ?>
                <!-- close .events-conrent__item -->
            </div>
        </div>
        <?php endif; ?>

        <?php if(!empty($motoclubs)): ?>
        <div class="result-motoclub">
            <h2>Мотоклубы</h2>
            <div class="motoclub-content-promo">
                <?php foreach($motoclubs as $item): ?>
                    <div class="motoclub-content-promo-item">
                        <a href="<?= \yii\helpers\Url::to(['moto_clubs/moto_clubs/view', 'id' => $item->id]); ?>" class="motoclub-content-promo-pic">
                            <img src="<?= $item->logo; ?>" alt="">
                        </a>
                        <a href="<?= \yii\helpers\Url::to(['moto_clubs/moto_clubs/view', 'id' => $item->id]); ?>" class="button button_orange events-conrent__item_price"><?= \common\classes\EventsFunction::get_city_event($item->city_id);?></a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <?php endif; ?>

        <?php if(!empty($news)): ?>
        <div class="result-news">
            <div class="news__box">
                <!-- close .news__item -->
                <!-- open .news__item -->
                <?php foreach ($news as $item): ?>
                    <div class="news__item">
                        <img class="news__item_thumb" src="<?= $item->img; ?>" alt="" />
                        <!-- open .news__item_desc -->
                        <div class="news__item_desc">
                            <small class="news__item_date"><?= date('d.m.Y', $item->dt_add); ?></small>
                            <h4><?= $item->name; ?></h4>
                            <p><?= $item->short_text; ?></p>
                            <a href="<?= \yii\helpers\Url::to(['/news/default/views', 'slug' => $item->slug])?>" class="news__item_more">Подробнее
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
                                    <path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
                                </svg>
                            </a>
                        </div>
                        <!-- close .news__item_desc -->

                    </div>
                <?php endforeach; ?>
                <!-- close .news__item -->
            </div>
        </div>
        <?php endif; ?>

        <?php if(!empty($post)): ?>
        <div class="result-article">
            <h2>Список статей</h2>
            <?php foreach ($post as $item): ?>
                <div class="item-article">
                    <a href="<?= \yii\helpers\Url::to(['/user_post/user_post/view', 'id' => $item->id])?>"><?= $item->title; ?></a>
                    <span class="item-article-date"><?= date('d.m.Y', $item->dt_add)?></span>
                    <!--<a class="events-conrent__item_edit">(mark)</a>-->
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>