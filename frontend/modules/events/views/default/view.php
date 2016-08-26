<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Events */

$this->title = $model['name'];
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//\common\classes\Debug::prn($model->organizer);
//die;
?>
<section class="event__content">
  <div class="container">
    <div class="event__content_place">
      <h2 class="date-event">Дата начала: <span><?=date('d.m.Y',$model['dt_start'])?></span> </h2>
      <h2 class="date-event">Дата окончания: <span><?if($model['dt_end']){echo date('d.m.Y.',$model['dt_end']);}?></span> </h2>
      <p class="about-place">Место проведения: <span>Россия / Тульская область / <?=$model['city']['Name']?></span><a href="#" class="kilometers">3000 км</a></p>
      <p class="about-place">Вид мероприятия: <span><?=$model['type']['name']?></span></p>
      <p class="about-place">Организаторы:  <span><?php foreach($model['organizer'] as $item) echo $item['club']['name']?></span></p>
      <p class="link-site">Сайт: <a href="<?=$model['site_url']?>"><?=$model['site_url']?></a></p>
      <a class="soc-link" href="<?=$model['vk_url']?>"><span class="icon-soc-link vk-icon"></span><?=$model['vk_url']?> </a>
      <a class="soc-link" href="<?=$model['fb_url']?>"><span class="icon-soc-link fb-icon"></span><?=$model['fb_url']?> </a>
      <a class="soc-link" href="<?=$model['ok_url']?>"><span class="icon-soc-link ok-icon"></span><?=$model['ok_url']?> </a>
      <div class="event-button">
        <a href="#" class="button button_gray ">Едет: <?=$participants?></a>
        <button id="add_event_to_bookmarks" class="button button_dark event-button-bookmarks">В закладки</button>
        <a href="#" class="button button_orange event-button-went">Я поеду</a>
      </div>
            <div class="gallery">
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm6.staticflickr.com/5612/15344856989_449794889d_b.jpg" title="Morning Twilight (Jose Hamra Images)">
<img src="img/photo-pic.png" alt="">
</a>
<a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7289/16207238089_0124105172_b.jpg" title="(Eric Goncalves (cathing up again!))">
<img src="img/photo-pic.png" alt="">
</a>
<a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm9.staticflickr.com/8568/16388772452_f4d77a92c7_b.jpg" title="Arctic Paradise (Tom Draxler)">
<img src="img/photo-pic.png" alt="">
</a>
<a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
<img src="img/photo-pic.png" alt="">
</a>
<a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
<img src="img/photo-pic.png" alt="">
</a>
<a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
<img src="img/photo-pic.png" alt="">
</a>
<a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
<img src="img/photo-pic.png" alt="">
</a>

<a href="" target="_blank" class="gallery-item all-photos">Все фото</a>
            </div>
    </div>
    <div class="event__content_promo-pic">
      <img src="img/promo-pic.png" alt="">
    </div>
  </div>
</section>
<section class="event__maps">
  <div class="container">
    <h2 class="gps-coordinate">ТОЧНЫЕ GPS-КООРДИНАТЫ: 55`21`34`N  37`142`43`E</h2>
    <div id="map"></div>
  </div>
</section>
<section class="program__event">
    <div class="container">
        <h2 class="program__event-title">ПРОГРАММА</h2>
        <div class="program__event_about">
            <span class="mini-about-block">
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
            </span>
        </div>
        <div class="program__event_promo-pic">
            <img src="img/program-promo-pic.png" alt="">
        </div>
    </div>
</section>
<section class="old-event">
    <div class="container">
        <h2 class="old-event-title">2015     Зимний мотофестиваль Самовар-Треффен</h2>
    </div>
</section>
<section class="event__content">
  <div class="container">
    <div class="event__content_place">
      <h2 class="date-event">Дата начала: <span> 12 февраля 2016</span> </h2>
      <h2 class="date-event">Дата окончания: <span> 14 февраля 2016</span> </h2>
      <p class="about-place">Место проведения: <span>Россия / Тульская область / Тула</span><a href="#" class="kilometers old-kilometers">3000 км</a></p>
      <p class="about-place">Вид мероприятия: <span>зимний мотофестиваль</span></p>
      <p class="about-place">Организаторы:  <span>Мммммммммм</span></p>
      <p class="link-site">Сайт: <a href="">www.dalnak.com</a></p>
      <a class="soc-link" href=""><span class="icon-soc-link vk-icon-old"></span>new.vk.com/peso4nica_art </a>
      <a class="soc-link" href=""><span class="icon-soc-link fb-icon-old"></span>new.vk.com/peso4nica_art </a>
      <a class="soc-link" href=""><span class="icon-soc-link ok-icon-old"></span>new.vk.com/peso4nica_art </a>
      <div class="event-button">
        <a href="#" class="button button_gray ">Поехало: 1500</a>
      </div>
    </div>
    <div class="event__content_promo-pic">
      <img src="img/promo-pic-old.png" alt="">
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
            <span class="mini-about-block">
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
            </span>
        </div>
        <div class="program__event_promo-pic">
            <img src="img/program-promo-pic-old.png" alt="">
        </div>
    </div>
</section>
<section class="old-event">
    <div class="container">
        <h2 class="old-event-title">2014     Зимний мотофестиваль Самовар-Треффен</h2>
    </div>
<a href="#" class="button button_border">ЗАГРУЗИТЬ ЕЩЕ +</a>
</section>