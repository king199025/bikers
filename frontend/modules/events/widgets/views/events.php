<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02.09.16
 * Time: 11:56
 */
?>
<!-- open .events -->
    <section class="events">
        <!-- open .container -->
        <div class="container">
            <h3>Последние добавленные мероприятия</h3>
            <!-- open .events__flex -->
            <div class="events__flex">
                <!-- open .events__box -->
                <div class="events__box">
                    <?php foreach($events as $item): ?>
                    <a href="<?=\yii\helpers\Url::to(['/events/default/view','id'=>$item['id']])?>" class="events__item">
                        <img src="<?=$item['afisha']; ?>" alt="" class="events__item_thumb" />
                        <span class="events__item_desc"><?=$item['name']?></span>
                    </a>
                    <?php endforeach; ?>
                </div>
                <!-- close .events__box -->
                <!-- open .events__add -->
                <div class="events__add">
                    <h4>Добавить мероприятие</h4>
                    <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p>
                    <a href="<?=\yii\helpers\Url::to('/events/default/create')?>" class="button button_orange">+ Добавить мероприятие</a>
                    <blockquote>
                        <span>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</span>
                        <span>Далеко-далеко за словесными горами в стране.</span>
                    </blockquote>
                </div>
                <!-- close .events__add -->
            </div>
            <!-- close .events__flex -->
        </div>
        <!-- close .container -->
    </section>
    <!-- close .events -->