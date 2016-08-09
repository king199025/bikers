<?php
$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- open .news__all -->
<section class="news__all">
    <!-- open .container -->

    <div class="container">
        <!-- open .news__box -->
        <div class="news__box">

            <?php foreach($news as $item): ?>
                <!-- open .news__item -->
                <div class="news__item">
                    <img class="news__item_thumb" src="<?= $item->img;?>" alt="" />
                    <!-- open .news__item_desc -->
                    <div class="news__item_desc">
                        <small class="news__item_date"><?= date('d.m.Y', $item->dt_add); ?></small>
                        <h4><?= $item->name; ?></h4>
                        <p><?= $item->short_text; ?> </p>
                        <a href="<?= \yii\helpers\Url::to(['/news/default/views', 'slug' => $item->slug])?>" class="news__item_more">Подробнее
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
                                <path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
                            </svg>
                        </a>
                    </div>
                    <!-- close .news__item_desc -->

                </div>
                <!-- close .news__item -->
            <?php endforeach; ?>
        </div>
        <a href="#" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" id="more-news" data-count="<?= $page; ?>" class="button button_border">ЗАГРУЗИТЬ ЕЩЕ +</a>
    </div>
    </div>
    <!-- close .container -->
</section>
<!-- close .news__all -->