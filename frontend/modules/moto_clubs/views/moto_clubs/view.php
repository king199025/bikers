<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\moto_clubs\models\MotoClubs */

$this->title = $model->name_rus;
$this->params['breadcrumbs'][] = ['label' => 'Мотоклубы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//\common\classes\Debug::prn($personal);
?>
<section class="event__content">
    <div class="container">
        <div class="event__content_place">
            <h2 class="date-event">Дата основания: <span> <?= \common\classes\DataHelper::rdate('d M Y', $model->dt_start)?></span> </h2>
            <h2 class="date-event">Адрес: г.<?= \common\classes\EventsFunction::get_city_event($model->city_id)?>
            <?= (empty($model->address)) ? "" : ", $model->address" ; ?>  </h2>
            <p class="about-place">Телефон: <span><?= $model->phone; ?></span></p>
            <p class="about-place">Почта: <a href="mailto:<?= $model->email; ?>"><?= $model->email; ?></a></p>
            <p class="about-place">Скайп:  <a href="skype:<?= $model->skype; ?>?chat"><?= $model->skype; ?></a></p>
            <p class="link-site">Сайт: <a href="<?= $model->site; ?>"><?= $model->site; ?></a></p>
            <a class="soc-link" href=""><span class="icon-soc-link vk-icon"></span><?= $model->group_vk; ?> </a>
            <a class="soc-link" href=""><span class="icon-soc-link fb-icon"></span><?= $model->group_fb; ?> </a>
            <a class="soc-link" href=""><span class="icon-soc-link ok-icon"></span><?= $model->group_ok; ?></a>
            <div class="gallery">
                <?php foreach($img as $item):?>
                    <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="/<?= $item->img;?>" title="<?= $model->name_en; ?>">
                        <img src="/<?= $item->img;?>" alt="">
                    </a>
                <?php endforeach; ?>
                <?php if($imgCount > 7):?>
                    <a href="<?= \yii\helpers\Url::to(['all_photo', 'id' => $model->id]); ?>" target="_blank" class="gallery-item all-photos">Все фото</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="event__content_promo-pic">
            <img src="<?= $model->logo; ?>" alt="">
        </div>
    </div>
</section>
<section class="knives__maps" id="event__maps">
    <span id="latlon" lat="<?= \common\classes\EventsFunction::getGpsLat($model['city_id'])?>" lon="<?= \common\classes\EventsFunction::getGpsLon($model['city_id'])?>"></span>
    <div class="container">
        <h2 class="gps-coordinate">Адрес</h2>
        <div id="map"></div>
    </div>
</section>
<section class="about-knives">
    <div class="container">
        <h2 class="about-knives-title">О МОТОКЛУБЕ <span><a class="pokazat-2" href="">Посмотреть</a></span></h2>
        <div class="about-knives-hide">
            <div class="about-knives-content">
                <?= $model->description; ?>

            </div>
        </div>
    </div>
</section>
<section class="moto-faces">
    <div class="container">
        <h2 class="about-knives-title">МОТОКЛУБ В ЛИЦАХ <span><a class="pokazat-1" href="">Посмотреть</a></span></h2>
        <div class="moto-faces-block-hide">
            <div class="moto-faces-block">
                <?php foreach($personal as $item): ?>
                    <div class="moto-faces-item">
                        <div class="face-pic">
                            <?php if(empty($item['profile']->avatar)):?>
                                <img src="/img/face-pic.png" alt="">
                            <?php else: ?>
                                <img src="<?= $item['profile']->avatar ?>" alt="">
                            <?php endif;?>
                        </div>
                        <div class="moto-faces-info">
                            <h3 class="moto-faces-info-title"><?= $item['user']->road_nickname; ?></h3>
                            <p class="moto-faces-info-position"><?= $item->position; ?></p>
                            <a href="<?= $item->link_vk; ?>" target="_blank" class="moto-faces-link"><?= $item->link_vk; ?></a>
                            <p class="moto-faces-number"><?= $item->phone; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!--<a href="#" class="button button_border">ЗАГРУЗИТЬ ЕЩЕ +</a>-->
        </div>
    </div>
</section>
<?php if(!empty($events)): ?>
<section class="interventions">
    <div class="container">
        <h2 class="about-knives-title">ПРОВОДИМЫЕ МЕРОПРИЯТИЯ</h2>
        <?php foreach ($events as $item): ?>
            
            <div class="interventions-row">
                <div class="interventions-promo">
                    <img src="img/program-knife-promo-pic.png" alt="">
                </div>
                <a href="" class="interventions-text">
                    <p><?= $item->name?></p>
                    <span><?= date('d.m.Y', $item->dt_start); ?></span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>