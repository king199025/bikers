<?php
/**
 * @var $news common\models\db\News
 */
?>

<!-- open .news -->
<section class="news">
    <!-- open .container -->
    <div class="container">
        <a href="<?= \yii\helpers\Url::to(['/news'])?>"><h3>Новости</h3></a>
        <!-- open .news__flex -->
        <div class="news__flex">
            <!-- open .news__box -->
            <div class="news__box">

                <?php foreach($news as $item) :?>

                    <!-- open .news__item -->
                    <div class="news__item">
                        <img class="news__item_thumb" src="<?= $item->img; ?>" alt="<?= $item->name?>" />
                        <small class="news__item_date"><?= date('d.m.Y', $item->dt_add)?></small>
                        <h4><?= $item->name?></h4>
                        <p><?= $item->short_text; ?> </p>
                        <a href="<?= \yii\helpers\Url::to(['/news/default/views', 'slug' => $item->slug])?>" class="news__item_more">Подробнее
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
                                <path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
                            </svg>
                        </a>
                    </div>
                    <!-- close .news__item -->
                <?php endforeach; ?>

            </div>
            <!-- close .news__box -->

            <!-- open .news__expected -->
            <div class="news__expected">
                <!-- open .news__expected_head -->
                <div class="news__expected_head">
    					<span class="news__expected_head_icon">
    						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.481 19.481"><path d="M10.201.758l2.478 5.865 6.344.545a.5.5 0 0 1 .285.876l-4.812 4.169 1.442 6.202a.5.5 0 0 1-.745.541l-5.452-3.288-5.452 3.288a.5.5 0 0 1-.745-.541l1.442-6.202-4.813-4.17a.5.5 0 0 1 .285-.876l6.344-.545L9.28.758a.5.5 0 0 1 .921 0z"/></svg>
    					</span>
                    <h4>Самые ожидаемые мероприятия месяца </h4>
                </div>
                <!-- close .news__expected_head -->
                <?php foreach ($events as $item): ?>
                    <?php if($item->dt_end >= time()): ?>
                <!-- open .news__expected_item -->
                <div class="news__expected_item">
                    <!-- open .news__expected_item_thumb -->
                    <div class="news__expected_item_thumb">
                        <img src="<?=$item['afisha'] ? '/frontend/web/media/upload/'.$item['afisha'] :'/frontend/web/img/placeholder.png' ?>" alt="" />
                    </div>
                    <!-- close .news__expected_item_thumb -->
                    <!-- open .news__expected_item_desc -->
                    <div class="news__expected_item_desc">
                        <strong class="news__expected_item_title"><?=$item['name']?></strong>
							<span class="news__expected_item_place">
								Opr:
								<a href="<?=\yii\helpers\Url::to(['/events/default/view','id'=>$item['id']])?>"><?=$item['name']?></a>
							</span>
                        <small class="news__expected_item_date"><?=date('d.M.Y',$item['dt_start'])?></small>
                    </div>
                    <!-- close .news__expected_item_desc -->
                    <a href="<?=\yii\helpers\Url::to(['view','id'=>$item['id']])?>" class="news__expected_item_see">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-77 272.9 456.8 247.4"><path d="M371.9 386.7c-.9-1.2-23.1-28.9-61-56.8C260.2 292.6 205 273 151.3 273c-53.7 0-108.8 19.7-159.6 56.9-37.9 27.9-60.1 55.6-61 56.8l-7.8 9.9 7.8 9.9c.9 1.2 23.1 28.9 61 56.8 50.7 37.3 105.9 56.9 159.6 56.9 53.7 0 108.8-19.7 159.6-56.9 37.9-27.9 60.1-55.6 61-56.8l7.8-9.9-7.8-9.9zm-220.5 96.5c-47.8 0-86.6-38.9-86.6-86.6 0-7.5 1-14.8 2.7-21.7l-19.8-3.3c-2 8.2-3 16.6-3 25 0 30.9 13.2 58.7 34.2 78.2-27.1-10-50.1-24-67.4-36.7-21.5-15.7-37.6-31.6-46.8-41.5 9.2-9.9 25.3-25.8 46.8-41.5 17.4-12.7 40.4-26.7 67.4-36.7l13.3 15c15.5-14.5 36.3-23.4 59.2-23.4 47.8 0 86.6 38.9 86.6 86.6s-38.8 86.6-86.6 86.6zm139.9-45.1c-17.4 12.7-40.4 26.7-67.4 36.7 21-19.5 34.2-47.3 34.2-78.2s-13.2-58.7-34.2-78.2c27.1 10 50.1 24 67.4 36.7 21.5 15.7 37.6 31.6 46.8 41.5-9.2 9.9-25.3 25.8-46.8 41.5z"/><path d="M96.3 379.8c-1.7 5.5-2.5 11.1-2.5 16.8 0 31.8 25.8 57.6 57.6 57.6s57.6-25.8 57.6-57.6-25.8-57.6-57.6-57.6c-15.5 0-29.6 6.1-39.9 16.1l28.4 32-43.6-7.3z"/></svg>
                    </a>
                </div>
                <!-- close .news__expected_item -->
                        <?php endif; ?>
                <?php endforeach; ?>

            </div>
            <!-- close .news__expected -->
        </div>
        <!-- close .news__flex -->
    </div>
    <!-- close .container -->
</section>
<!-- close .news -->
