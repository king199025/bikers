<?php
$this->title = $club->name;
$this->params['breadcrumbs'][] = ['label'=>'Мотоклубы','url'=>'/clubs'];
$this->params['breadcrumbs'][] = $this->title . ', г.' . $club->city /*. \yii\bootstrap\Html::a('Редактировать','#')*/;
?>
<!--article class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumbs__list">
			<li><a href="#">Главная </a></li>
			<li><a href="#">Мотоклубы</a></li>
      <li>ЧЕРНЫЕ НОЖИ, г.Екатеринбург / BLACK KNIVES, Ekaterinburg<span><a href="">Редактировать</a></span></li>
		</ol>
	</div>
</article -->
<section class="event__content">
  <div class="container">
      
    <div class="event__content_place">
        <span><a href="">Редактировать</a></span>
      <h2 class="date-event">Дата основания: <span> <?=$club->created?></span> </h2>
      <h2 class="date-event">Адрес: <?=$club->city?>  </h2>
      <p class="about-place">Телефон: <span><?=$club->phone?></span></p>
      <p class="about-place">Почта: <a href="mailto:<?=$club->email?>"><?=$club->email?></a></p>
      <p class="about-place">Скайп:  <a href="skype<?=$club->skype?>?chat"><?=$club->skype?></a></p>
      <p class="link-site">Сайт: <a href="http://<?=$club->site_url?>"><?=$club->site_url?></a></p>
      <a class="soc-link" href=""><span class="icon-soc-link vk-icon"></span><?=$club->vk_url?> </a>
      <a class="soc-link" href=""><span class="icon-soc-link fb-icon"></span><?=$club->fb_url?> </a>
      <a class="soc-link" href=""><span class="icon-soc-link ok-icon"></span><?=$club->ok_url?> </a>
			<div class="gallery">
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
        <a href="http://html.art-craft.tk/dalnak/photos.html" target="_blank" class="gallery-item all-photos">Все фото</a>
			</div>
    </div>
    <div class="event__content_promo-pic">
        <img src="/<?=$club->promo?>" alt="">
    </div>
  </div>
</section>
<section class="knives__maps">
  <div class="container">
    <h2 class="gps-coordinate">Адрес</h2>
    <div id="mapblack"></div>
  </div>
</section>
<section class="about-knives">
  <div class="container">
    <h2 class="about-knives-title">О МОТОКЛУБЕ <span><a class="pokazat-2" href="">Посмотреть</a></span></h2>
		<div class="about-knives-hide">
		<div class="about-knives-content">
        <p class="about-knives-text">
          <?=$club->about?>
          </p>

    </div>
    <!--div class="about-knives-pic">
      <div class="about-knives-pic-1">
        <img src="/frontend/web/img/moto-pic-1.png" alt="">
      </div>
      <div class="about-knives-pic-2">
          <img src="/frontend/web/img/moto-pic-2.png" alt="">
      </div>

    </div-->

		</div>
  </div>
</section>
<section class="moto-faces">
  <div class="container">
    <h2 class="about-knives-title">МОТОКЛУБ В ЛИЦАХ <span><a class="pokazat-1" href="">Посмотреть</a></span></h2>
<div class="moto-faces-block-hide">
		<div class="moto-faces-block">
      <div class="moto-faces-item">
        <div class="face-pic">
          <img src="/frontend/web/img/face-pic.png" alt="">
        </div>
        <div class="moto-faces-info">
          <h3 class="moto-faces-info-title">Васильев Ярослав </h3>
          <p class="moto-faces-info-position">должность</p>
          <a href="" class="moto-faces-link">vk.com/user2569856868</a>
          <p class="moto-faces-number">4 343 234 65 43</p>
        </div>
      </div>
      <div class="moto-faces-item">
        <div class="face-pic">
          <img src="/frontend/web/img/face-pic.png" alt="">
        </div>
        <div class="moto-faces-info">
          <h3 class="moto-faces-info-title">Васильев Ярослав </h3>
          <p class="moto-faces-info-position">должность</p>
          <a href="" class="moto-faces-link">vk.com/user2569856868</a>
          <p class="moto-faces-number">4 343 234 65 43</p>
        </div>
      </div>
      <div class="moto-faces-item">
        <div class="face-pic">
          <img src="/frontend/web/img/face-pic.png" alt="">
        </div>
        <div class="moto-faces-info">
          <h3 class="moto-faces-info-title">Васильев Ярослав </h3>
          <p class="moto-faces-info-position">должность</p>
          <a href="" class="moto-faces-link">vk.com/user2569856868</a>
          <p class="moto-faces-number">4 343 234 65 43</p>
        </div>
      </div>
      <div class="moto-faces-item">
        <div class="face-pic">
          <img src="/frontend/web/img/face-pic.png" alt="">
        </div>
        <div class="moto-faces-info">
          <h3 class="moto-faces-info-title">Васильев Ярослав </h3>
          <p class="moto-faces-info-position">должность</p>
          <a href="" class="moto-faces-link">vk.com/user2569856868</a>
          <p class="moto-faces-number">4 343 234 65 43</p>
        </div>
      </div>
      <div class="moto-faces-item">
        <div class="face-pic">
          <img src="/frontend/web/img/face-pic.png" alt="">
        </div>
        <div class="moto-faces-info">
          <h3 class="moto-faces-info-title">Васильев Ярослав </h3>
          <p class="moto-faces-info-position">должность</p>
          <a href="" class="moto-faces-link">vk.com/user2569856868</a>
          <p class="moto-faces-number">4 343 234 65 43</p>
        </div>
      </div>
      <div class="moto-faces-item">
        <div class="face-pic">
          <img src="/frontend/web/img/face-pic.png" alt="">
        </div>
        <div class="moto-faces-info">
          <h3 class="moto-faces-info-title">Васильев Ярослав </h3>
          <p class="moto-faces-info-position">должность</p>
          <a href="" class="moto-faces-link">vk.com/user2569856868</a>
          <p class="moto-faces-number">4 343 234 65 43</p>
        </div>
      </div>
    </div>
		  <a href="#" class="button button_border">ЗАГРУЗИТЬ ЕЩЕ +</a>
	</div>
  </div>
</section>
<section class="interventions">
  <div class="container">
    <h2 class="about-knives-title">ПРОВОДИМЫЕ МЕРОПРИЯТИЯ</h2>
    <div class="interventions-row">
      <div class="interventions-promo">

      </div>
      <div class="interventions-text">
        <p>ДР Черные Ножи - 2016  </p>
        <span>26.03.2016</span>
      </div>
    </div>
    <div class="interventions-row">
      <div class="interventions-promo">

      </div>
      <div class="interventions-text">
        <p>Открытие мотосезона Екатеринбург  </p>
        <span>26.03.2016</span>
      </div>
    </div>
    <div class="interventions-row">
      <div class="interventions-promo">

      </div>
      <div class="interventions-text">
        <p>Байк Рок Фестиваль “Черные Ножи” - Екатеринбург  </p>
        <span>26.03.2016</span>
      </div>
    </div>
  </div>
</section>