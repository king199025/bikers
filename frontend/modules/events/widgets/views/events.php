<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02.09.16
 * Time: 11:56
 */


/*\common\classes\Debug::prn(Yii::$app->request->userAgent);*/
?>

<article class="page__tabcontent_first two_first">
    <form class="motoclub-search" method="post" action="/events/default/index">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken(); ?>">
        <input type="text" name="search_events" class="navigation__search_box motoclub-search-input" placeholder="Поиск: название, город">
        <button class="navigation__search_icon motoclub-search-pic">
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 250.313 250.313"><path d="M244.186 214.604l-54.379-54.378c-.289-.289-.628-.491-.93-.76 10.7-16.231 16.945-35.66 16.945-56.554C205.822 46.075 159.747 0 102.911 0S0 46.075 0 102.911c0 56.835 46.074 102.911 102.91 102.911 20.895 0 40.323-6.245 56.554-16.945.269.301.47.64.759.929l54.38 54.38c8.169 8.168 21.413 8.168 29.583 0 8.168-8.169 8.168-21.413 0-29.582zm-141.275-44.458c-37.134 0-67.236-30.102-67.236-67.235 0-37.134 30.103-67.236 67.236-67.236 37.132 0 67.235 30.103 67.235 67.236s-30.103 67.235-67.235 67.235z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
        </button>
    </form>
    <!-- open .events-conrent__box -->
    <div class="events-conrent__box">
        <!-- open .events-conrent__item -->

        <?php foreach($events as $item): ?>
            <div class="events-conrent__item">
                <!-- open .events-conrent__item_thumb -->
                <a href="<?=\yii\helpers\Url::to(['/events/default/view','id'=>$item['id']])?>" class="events-conrent__item_thumb">
                    <img src="<?=$item['afisha']; ?>" alt="" />
                    <!--<span class="events-conrent__item_distance"><strong>2800</strong>км</span>-->
                </a>
                <!-- close .events-conrent__item_thumb -->
                <a href="#" class="events-conrent__item_title"><?=$item['name']?></a>
                <span class="events-conrent__item_date"><?= \common\classes\DataHelper::rdate('d M', $item->dt_start); ?></span>
                <a href="#" class="button button_orange events-conrent__item_price"><?= \common\classes\EventsFunction::get_city_event($item->city); ?></a>
            </div>

        <?php endforeach; ?>
    </div>
    <!-- close .events-conrent__box -->
</article>