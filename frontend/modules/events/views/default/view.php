<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $event common\models\db\Events */

$this->title = $event['name'];
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//\common\classes\Debug::prn($old);
//die;
?>
<section class="event__content">
  <div class="container">
    <div class="event__content_place">
      <h2 class="date-event">Дата начала: <span><?= date('d.m.Y',$event['dt_start']); ?></span> </h2>
      <h2 class="date-event">Дата окончания: <span><?= date('d.m.Y.',$event['dt_end']); ?></span> </h2>
      <p class="about-place">Место проведения: <span><?= \common\classes\EventsFunction::get_local_event($event->city)?></span><a href="#" class="kilometers">3000 км</a></p>
      <p class="about-place">Вид мероприятия: <span><?= $event['type_events']['name']; ?></span></p>
      <!--<p class="about-place">Организаторы:  <span><?php /*foreach($model['organizer'] as $item) echo $item['club']['name']*/?></span></p>-->
      <p class="link-site">Сайт: <a href="<?=$event['site_url']?>"><?=$event['site_url']?></a></p>
      <a class="soc-link" href="<?=$event['vk_url']?>"><span class="icon-soc-link vk-icon"></span><?=$event['vk_url']?> </a>
      <a class="soc-link" href="<?=$event['fb_url']?>"><span class="icon-soc-link fb-icon"></span><?=$event['fb_url']?> </a>
      <a class="soc-link" href="<?=$event['ok_url']?>"><span class="icon-soc-link ok-icon"></span><?=$event['ok_url']?> </a>
      <div class="event-button">
        <a href="#" class="button button_gray ">Едет: <?=$participants?></a>
        <button id="add_event_to_bookmarks" data-event="<?=$event['id']?>" class="button button_dark event-button-bookmarks">В закладки</button>
        <button id="add_participant" data-event="<?=$event['id']?>" class="button button_orange event-button-went">Я поеду</button>
        <!--<a href="<?/*=\yii\helpers\Url::to(['/events/default/copy','id'=>$event['id']])*/?>" id="copy_event" data-event="<?/*=$model['id']*/?>" class="button button_orange event-button-went">Сделать копию</a>-->
      </div>
            <!--<div class="gallery">
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm6.staticflickr.com/5612/15344856989_449794889d_b.jpg" title="Morning Twilight (Jose Hamra Images)">
                <img src="/frontend/web/img/photo-pic.png" alt="">
                </a>
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7289/16207238089_0124105172_b.jpg" title="(Eric Goncalves (cathing up again!))">
                <img src="/frontend/web/img/photo-pic.png" alt="">
                </a>
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm9.staticflickr.com/8568/16388772452_f4d77a92c7_b.jpg" title="Arctic Paradise (Tom Draxler)">
                <img src="/frontend/web/img/photo-pic.png" alt="">
                </a>
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
                <img src="/frontend/web/img/photo-pic.png" alt="">
                </a>
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
                <img src="/frontend/web/img/photo-pic.png" alt="">
                </a>
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
                <img src="/frontend/web/img/photo-pic.png" alt="">
                </a>
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
                <img src="/frontend/web/img/photo-pic.png" alt="">
                </a>

                <a href="" target="_blank" class="gallery-item all-photos">Все фото</a>
            </div>-->
    </div>
    <div class="event__content_promo-pic">
      <img src="<?= $event['afisha']; ?>" alt="">
    </div>
  </div>
</section>
<section class="event__maps" id="event__maps">
    <span id="latlon" lat="<?= \common\classes\EventsFunction::getGpsLat($event['city'])?>" lon="<?= \common\classes\EventsFunction::getGpsLon($event['city'])?>"></span>
  <div class="container">

    <h2 class="gps-coordinate">ТОЧНЫЕ GPS-КООРДИНАТЫ: <?= \common\classes\EventsFunction::getGps($event['city'])?></h2>
    <div id="map"></div>
  </div>
</section>
<section class="program__event">
    <div class="container">
        <h2 class="program__event-title">ПРОГРАММА</h2>
        <div class="program__event_about">
            <?=$event['program']?>
        </div>
        <div class="program__event_promo-pic">
            <img src="<?= $event['afisha']; ?>" alt="">
        </div>
    </div>
</section>
<?/* if($old['id'] != $model['id']):*/?><!--
<section class="old-event">
    <div class="container">
        <h2 class="old-event-title"><?/*=date('Y',$old['dt_start'])*/?>    <?/*=$old['name']*/?></h2>
    </div>
</section>
<section class="event__content">
  <div class="container">
    <div class="event__content_place">
      <h2 class="date-event">Дата начала: <span> <?/*=date('d.m.Y.',$old['dt_start'])*/?></span> </h2>
      <h2 class="date-event">Дата окончания: <span> <?/*if($old['dt_end']){echo date('d.m.Y.',$old['dt_end']);}*/?></span> </h2>
      <p class="about-place">Место проведения: <span>Россия / Тульская область / <?/*=$old['city']['Name']*/?></span><a href="#" class="kilometers old-kilometers">3000 км</a></p>
      <p class="about-place">Вид мероприятия: <span><?/*=$old['type']['name']*/?></span></p>
      <p class="about-place">Организаторы:  <span><?php /*foreach($old['organizer'] as $item) echo $item['club']['name']*/?></span></p>
      <p class="link-site">Сайт: <a href="<?/*=$old['site_url']*/?>"><?/*=$old['site_url']*/?></a></p>
      <a class="soc-link" href="<?/*=$old['vk_url']*/?>"><span class="icon-soc-link vk-icon-old"></span><?/*=$old['vk_url']*/?> </a>
      <a class="soc-link" href="<?/*=$old['fb_url']*/?>"><span class="icon-soc-link fb-icon-old"></span><?/*=$old['fb_url']*/?> </a>
      <a class="soc-link" href="<?/*=$old['ok_url']*/?>"><span class="icon-soc-link ok-icon-old"></span><?/*=$old['ok_url']*/?> </a>
      <div class="event-button">
        <a href="#" class="button button_gray ">Поехало: <?/*=$old_participants*/?></a>
      </div>
    </div>
    <div class="event__content_promo-pic">
      <img src="<?/*=$old['afisha'] ? '/frontend/web/media/upload/'.$old['afisha'] :'/frontend/web/img/promo-pic-old.png'*/?>" alt="">
    </div>
  </div>
</section>
<section class="old-event-map">
    <div class="container">
        <p class="pokazat-map">Посмотреть карту</p>
    <div class="hide-map">
            <div id="map_old"></div>
    </div>
    </div>
</section>
<section class="program__event">
    <div class="container">
        <h2 class="program__event-title">ПРОГРАММА</h2>
        <div class="program__event_about">
            <!--span class="mini-about-block">
                <p class="program__event_about-text">Главное соревнование- СКАЙОРИНГ (только колясычи с человеком обутым в лыжи)</p>
                <p class="program__event_about-text">Традиционные соревнования- ДРАГРЕЙСИНГ, КОЛЬЦЕВАЯ ГОНКА ПО ГЛАДИ ОЗЕРА, ЦАРЬ ГОРЫ</p>
            </span>
            <span class="mini-about-block">
                <p class="program__event_about-text">Призы и подарки от MOTOLULKA.RU и организаторов (как всегда креативные и незабываемые) <br> (все само собой с подарочной надписью и символикой слета)</p>
            </span>
            <span class="mini-about-block">
                <p class="program__event_about-text">“Самовар Треффен-2016” не изменится, зона слета — место свободное от автомобилей, квадриков и снегоходов. ТОЛЬКО МОТОЦИКЛЫ!!!</p>
            </span>
            <span class="mini-about-block">
                <p class="program__event_about-text">Формат – палаточный, по договоренности — кемпинговый</p>
                <p class="program__event_about-text">Стоянка автомобилей находится в 3 км от лагеря.</p>
            </span>
            <span class="mini-about-block">
                <p class="program__event_about-text">Стоимость: Мотоциклы — 300 руб.</p>
                <p class="program__event_about-text">Любой участник независимо от пола – 200 руб.</p>
                <p class="program__event_about-text">Стоянка авто — 500 руб.</p>
                <p class="program__event_about-text">Дрова – 150 руб(вязанка) уточнять у организаторов</p>
                <p class="program__event_about-text">Солома –150 руб (тюк) уточнять у организаторов</p>
            </span>
            <span class="mini-about-block">
                <p class="program__event_about-text">ВНИМАНИЕ!!!!</p>
                <p class="program__event_about-text">Во избежании недопонимания организаторов.</p>
                <p class="program__event_about-text">1)этап ЦАРЬ-ГОРЫ очень опасен,просим принимать полные меры безопасности <br> (кто не верит поинтересуйтесь у участников прошедшего мероприятия)</p>
                <p class="program__event_about-text">2)на лед в ночное время выходить,выезжать,выползать не рекомендуем(спасать нет сил)</p>
            </span>
            <span class="mini-about-block">
                <p class="program__event_about-text">С уважением ко всем Братьям .</p>
                <p class="program__event_about-text">Процеров Артем( Темыч RAMCC) +7-926-036-80-13</p>
                <p class="program__event_about-text">Александр Уткин ( Чукча RAMCC) +7-920-770-66-77</p>
                <p class="program__event_about-text">Дмитрий Балаев (Deamon RAMCC) +7-925-792-01-81</p>
            </span
            <?/*=$old['program']*/?>
        </div>
        <div class="program__event_promo-pic">
            <img src="/frontend/web/img/program-promo-pic-old.png" alt="">
        </div>
    </div>
</section>
<section class="old-event">

<a href="#" class="button button_border">ЗАГРУЗИТЬ ЕЩЕ +</a>
</section>
--><?/* endif; */?>