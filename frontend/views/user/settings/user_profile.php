<?php
/**
 * @var $user \frontend\models\user\UserDec
 */
use common\classes\Debug;
use yii\helpers\Html;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
//\common\classes\Debug::prn($user);

?>

<!-- end header-personal.html-->
<!--<section class="pa_section">
    <div class="container">
        <div class="pa pa_personal">

            <h3 class="name_edit" >Байкер <a href="<?/*= \yii\helpers\Url::to(['/user/settings/profile'])*/?>" class="edit">редактриовать</a></h3>
            <div class="photo-container">
                <img class="photo" src="<?/*= \common\classes\UserFunction::getUser_avatar_url()*/?>" alt="фото">
            </div>
            <div class="biker-info">
                <p class="fullname">Имя: <span><?/*= $user->username;*/?></span></p>
                <p class="nickname">Байкерское имя: <span><?/*= $user->road_nickname;*/?></span></p>
                <p class="city">Город: <span></span></p>
                <p class="age">Возраст: <span><?/*=date('Y')-date('Y',$user->birthday); */?></span></p>
            </div>
            <div class="clearfix"></div>
            <h3 class="garage-add-bike">Мой гараж</h3>
            <a href="<?/*= \yii\helpers\Url::to(['/garage'])*/?>" class="garage-add-bike-button button button_orange">Добавить байк</a>
            <?php /*foreach($userMoto as $item):*/?>
                <div class="garage-form__in-garage_items">
                    <div class="moto-photo owl-bike">
                        <?php /*foreach($item['img_moto'] as $value): */?>
                            <div class="slide-bike"><img src="/<?/*= $value->img; */?>" alt="moto"></div>
                        <?php /*endforeach;*/?>

                    </div>
                    <div class="bike-info">
                        <p class="make">Марка <span><?/*= $item['car_mark']->name;*/?></span></p>
                        <p class="model">Модель <span><?/*= $item['car_model']->name;*/?></span></p>
                        <p class="power-engine">Мощность двигателя <span><?/*= $item->volume*/?></span></p>
                        <p class="active-bike">
                            <span>
                                <?/*=($item == 1) ? 'Байк действующий' : 'Бывший мотоцикл' */?>
                            </span>
                        </p>
                    </div>
                </div>
            <?php /*endforeach; */?>
        </div>
        <div class="pa pa_events">
            <div class="border">
                <div class="events-item-left">
                    <h4>МОИ МОТОСТЛЕТЫ</h4>

                    <ul>
                        <?php /*if(empty($eventsUser)):*/?>
                            <li><?/*= Html::a('Добавить', ['/events/default/create'], ['class' => 'orange']); */?></li>
                        <?php /*else: */?>
                            <?php /*foreach($eventsUser as $item): */?>

                                <li><a href="<?/*= \yii\helpers\Url::to(['/events/default/view','id'=>$item->id]);*/?>"><?/*=$item->name; */?></a></li>
                            <?php /*endforeach; */?>
                        <?php /*endif; */?>
                    </ul>
                    <p>Я еду</p>
                    <ul>
                        <?php /*if(empty($userGoEvents)): */?>
                            <li><?/*= Html::a('Посмотреть мотокалендарь', ['/events/default/index'], ['class' => 'orange']); */?></li>
                        <?php /*else: */?>
                            <?php /*foreach($userGoEvents as $item): */?>
                                <li><a href="<?/*= \yii\helpers\Url::to(['/events/default/view','id'=>$item['events']->id]);*/?>"><?/*=$item['events']->name; */?></a></li>
                            <?php /*endforeach;*/?>
                        <?php /*endif; */?>
                    </ul>
                    <p>Мотослеты из закладок</p>
                    <ul>
                        <?php /*if(empty($userBookEvents)): */?>
                            <li><?/*= Html::a('Посмотреть мотокалендарь', ['/events/default/index'], ['class' => 'orange']); */?></li>
                        <?php /*else: */?>
                            <?php /*foreach($userBookEvents as $item): */?>
                                <li><a href="<?/*= \yii\helpers\Url::to(['/events/default/view','id'=>$item['events']->id]);*/?>"><?/*=$item['events']->name; */?></a></li>
                            <?php /*endforeach;*/?>
                        <?php /*endif; */?>
                    </ul>
                </div>
                <div class="events-item-right">
                    <h4>МОИ ПУТЕШЕСТВИЯ</h4>
                    <p>Завершенные дальняки</p>
                    <ul>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                    </ul>
                    <p>Планируемые дальняки</p>
                    <ul>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                    </ul>
                    <p>Дальняки из закладок</p>
                    <ul>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                    </ul>
                </div>
            </div>
            <div class="events-control">
                <a href="<?/*=\yii\helpers\Url::to('/clubs/default/create')*/?>" class="button button_orange">Заяка на мотоклуб</a>
                <a href="#" class="button button_orange add_dalnak">Добавить дальняк</a>
            </div>
        </div>
        <div class="pa-little pa_buttons">
            <a href="#" class="pa_button button button_gray">Настройки оповещений</a>
            <a href="#" class="pa_button button button_gray">Сообщения</a>
            <a href="#" class="pa_button button button_gray">Мои закладки</a>

        </div>
        <div class="comments">
            <a href="#" class="comments-button button button_gray">Отзывы байкеров</a>
            <div class="clearfix"></div>
            <form action="#">
                <textarea class="new-comment" id="" cols="30" rows="10"></textarea>
                <input type="submit" class="button button_orange submit">
            </form>
            <div class="all-comments">
                <h4>ВСЕ ОТЗЫВЫ</h4>

                <div class="comment-container">

                    <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exsunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dol
                    </p>

                    <div class="comment-date">05.08.2016</div>
                </div>

                <div class="comment-container">

                    <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exsunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dol
                    </p>

                    <div class="comment-date">05.08.2016</div>
                </div>


            </div>
        </div>



    </div>
</section>-->
<section class="motoclub-filter kabinet-main-filter">
    <div class="container">
        <div class="web-filter">
            <div class="events-calendar__control">
                <a href="#" class="events-calendar__control_link">настройки оповещений</a>
            </div>
            <div class="events-category__item">
                <input type="checkbox" name="new_events" id="events-category_1" <?= ($userWarning->new_events == 1) ? 'checked' : ''?> class="warning">
                <label for="events-category_1">
                    <span class="events-category__item_title"><em>Новые слеты</em></span>
                    <span class="events-category__item_marker"></span>
                </label>
            </div>
            <div class="events-category__item">
                <input type="checkbox" name="bookmark_events" id="events-category_2" <?= ($userWarning->bookmark_events == 1) ? 'checked' : ''?> class="warning">
                <label for="events-category_2">
                    <span class="events-category__item_title"><em>Мотослеты из заметок</em></span>
                    <span class="events-category__item_marker"></span>
                </label>
            </div>
            <div class="events-category__item">
                <input type="checkbox" name="new_clubs" id="events-category_3" <?= ($userWarning->new_clubs == 1) ? 'checked' : ''?> class="warning">
                <label for="events-category_3">
                    <span class="events-category__item_title"><em>Новые клубы</em></span>
                    <span class="events-category__item_marker"></span>
                </label>
            </div>
           <!-- <div class="events-category__item">
                <input type="checkbox" name="Warning[new_clubs]" id="events-category_4">
                <label for="events-category_4">
                    <span class="events-category__item_title"><em>Мотоклубы из заметок</em></span>
                    <span class="events-category__item_marker"></span>
                </label>
            </div>-->
            <div class="events-category__item">
                <input type="checkbox" name="new_post" id="events-category_5" <?= ($userWarning->new_post == 1) ? 'checked' : ''?> class="warning">
                <label for="events-category_5">
                    <span class="events-category__item_title"><em>Новые байкпосты</em></span>
                    <span class="events-category__item_marker"></span>
                </label>
            </div>
            <div class="events-category__item">
                <input type="checkbox" name="new_news" id="events-category_6" <?= ($userWarning->new_news == 1) ? 'checked' : ''?> class="warning">
                <label for="events-category_6">
                    <span class="events-category__item_title"><em>Мотоблог</em></span>
                    <span class="events-category__item_marker"></span>
                </label>
            </div>
            <div class="events-category__item">
                <input type="checkbox" name="new_travel" id="events-category_7" <?= ($userWarning->new_travel == 1) ? 'checked' : ''?> class="warning">
                <label for="events-category_7">
                    <span class="events-category__item_title"><em>Дальняки</em></span>
                    <span class="events-category__item_marker"></span>
                </label>
            </div>
            <div class="events-category__item">
                <input type="checkbox" name="bookmark_travel" id="events-category_8" <?= ($userWarning->bookmark_travel == 1) ? 'checked' : ''?> class="warning">
                <label for="events-category_8">
                    <span class="events-category__item_title"><em>Дальняки из заметок</em></span>
                    <span class="events-category__item_marker"></span>
                </label>
            </div>
        </div>
        <div class="mobile-filter">
            <div class="events-calendar__control">
                <a href="#" class="events-calendar__control_link">настройки оповещений</a>
            </div>
            <div class="hide-filter">
                <div class="events-category__item">
                    <input type="checkbox" name="events-category_1" id="events-category_1">
                    <label for="events-category_1">
                        <span class="events-category__item_title"><em>Новые слеты</em></span>
                        <span class="events-category__item_marker"></span>
                    </label>
                </div>
                <div class="events-category__item">
                    <input type="checkbox" name="events-category_2" id="events-category_2">
                    <label for="events-category_2">
                        <span class="events-category__item_title"><em>Мотослеты из заметок</em></span>
                        <span class="events-category__item_marker"></span>
                    </label>
                </div>
                <div class="events-category__item">
                    <input type="checkbox" name="events-category_3" id="events-category_3">
                    <label for="events-category_3">
                        <span class="events-category__item_title"><em>Новые клубы</em></span>
                        <span class="events-category__item_marker"></span>
                    </label>
                </div>
                <div class="events-category__item">
                    <input type="checkbox" name="events-category_4" id="events-category_4">
                    <label for="events-category_4">
                        <span class="events-category__item_title"><em>Мотоклубы из заметок</em></span>
                        <span class="events-category__item_marker"></span>
                    </label>
                </div>
                <div class="events-category__item">
                    <input type="checkbox" name="events-category_5" id="events-category_5">
                    <label for="events-category_5">
                        <span class="events-category__item_title"><em>Новые байкпосты</em></span>
                        <span class="events-category__item_marker"></span>
                    </label>
                </div>
                <div class="events-category__item">
                    <input type="checkbox" name="events-category_6" id="events-category_6">
                    <label for="events-category_6">
                        <span class="events-category__item_title"><em>Мотоблог</em></span>
                        <span class="events-category__item_marker"></span>
                    </label>
                </div>
                <div class="events-category__item">
                    <input type="checkbox" name="events-category_7" id="events-category_7">
                    <label for="events-category_7">
                        <span class="events-category__item_title"><em>Дальняки</em></span>
                        <span class="events-category__item_marker"></span>
                    </label>
                </div>
                <div class="events-category__item">
                    <input type="checkbox" name="events-category_8" id="events-category_8">
                    <label for="events-category_8">
                        <span class="events-category__item_title"><em>Дальняки из заметок</em></span>
                        <span class="events-category__item_marker"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="nav-button">
    <div class="container">
        <a href="<?= \yii\helpers\Url::to(['/user_post/user_post/create'])?>">Написать статью</a>
        <a href="">Точка на карту</a>
        <a href="<?= \yii\helpers\Url::to(['/travels/default/create'])?>">Добавить дальняк</a>
        <a href="">Добавить ЖЖ</a>
        <a href="">Сообщения</a>
    </div>
</section>
<section class="kabinet__tabs">
    <div class="container">
        <!-- open tabs -->
        <nav class="title__tabs">
            <ul>
                <li>
                    <a href="#" class="kabinet__tabs_target " data-tab="one">
                        <span>Личные данные</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="kabinet__tabs_target " data-tab="two">
                        <span>МОИ ПУТЕШЕСТВИЯ</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="kabinet__tabs_target kabinet__tabs_active" data-tab="three">
                        <span>МОИ ЗАКЛАДКИ</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="kabinet__tabs_target" data-tab="four">
                        <span>МОИ МОТОСЛЕТЫ</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="kabinet__tabs_target" data-tab="five">
                        <span>МОИ СТАТЬИ</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="kabinet__tabs_target" data-tab="six">
                        <span>МОИ МОТОКЛУБЫ</span>
                    </a>
                </li>


            </ul>
        </nav>
        <div class="box-connent">
            <article class="kabinet__tabcontent  one">
                <div class="kabinet-pesonal-data">
                    <div class="pesonal-data__thumb">
                        <div class="pesonal-data__thumb_pic">
                            <img src="<?= \common\classes\UserFunction::getUser_avatar_url(); ?>" alt="">
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['/user/settings/profile']) ?>" class="upd-photo">Обновить фото</a>
                    </div>
                    <div class="pesonal-data__info">
                        <h2><?= $user->username; ?><a href="<?= \yii\helpers\Url::to(['/user/settings/profile']) ?>">(редактировать)</a></h2>
                        <p>Байкерское имя: <span><?= $user->road_nickname;?></span></p>
                        <h3>Контактная информация <a href="<?= \yii\helpers\Url::to(['/user/settings/profile']) ?>">(редактировать)</a></h3>
                        <p>Город: <span>Донецк</span></p>
                        <p>Возраст: <span><?= date('Y')-date('Y',$user->birthday); ?></span></p>
                    </div>
                </div>
                <div class="kabinet-pesonal_garage">
                    <h2>Мой гараж <a href="<?= \yii\helpers\Url::to(['/garage']); ?>">(редактировать)</a></h2>
                    <?php if(!empty($userMoto)): ?>
                        <?php foreach($userMoto as $item):?>
                        <div class="garage-form__in-garage_items">
                            <div class="moto-photo">
                                <img src="/<?= $item['img_moto'][0]->img?>" alt="moto">
                            </div>
                            <div class="bike-info">
                                <p class="make">Марка <span><?= $item['car_mark']->name;?></span></p>
                                <p class="model">Модель <span><?= $item['car_model']->name;?></span></p>
                                <p class="power-engine">Мощность двигателя <span><?= $item->volume?></span></p>
                                <p class="active-bike">
                                <span>
                                    <?=($item == 1) ? 'Байк действующий' : 'Бывший мотоцикл' ?>
                                </span>
                                </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        В гараже не байков
                    <?php endif;?>
                </div>
            </article>


            <article class="kabinet__tabcontent two">
                <div class="kabinet-main-travels">
                    <!-- open .events-conrent__item -->
                    <?php foreach($userTravel as $item): ?>
                        <div class="events-conrent__item">
                            <!-- open .events-conrent__item_thumb -->
                            <a href="#" class="events-conrent__item_thumb">
                                <img src="<?= $item->icon; ?>" alt="" />
                                <span class="events-conrent__item_distance"><strong><?= $item->distance; ?></strong>км</span>
                            </a>
                            <!-- close .events-conrent__item_thumb -->
                            <a href="" class="button button_orange events-conrent__item_price"><?= $item->dt_start; ?></a>
                            <span class="events-conrent__item_title travels-item_title"><?= \common\classes\EventsFunction::get_city_event($item->city_start);?>- <?= \common\classes\EventsFunction::get_city_event($item->city_end);?></span>
                            <span class="events-conrent__item_edit">(<a href="">редактировать</a> / <a href="">удалить</a>)</span>
                        </div>
                    <?php  endforeach; ?>
                </div>
            </article>
            <article class="kabinet__tabcontent  three">
                <div class="bookmarks__favorite-travels">
                    <h2>Избранные путешествия  </h2>

                    <!-- open .events-conrent__item -->
                    <div class="events-conrent__item">
                        <!-- open .events-conrent__item_thumb -->
                        <a href="#" class="events-conrent__item_thumb">
                            <img src="img/city-pic.png" alt="" />
                            <span class="events-conrent__item_distance"><strong>2800</strong>км</span>
                        </a>
                        <!-- close .events-conrent__item_thumb -->
                        <a href="" class="button button_orange events-conrent__item_price">21.06.2016</a>
                        <span class="events-conrent__item_title travels-item_title">Москва - Севастополь</span>
                        <span class="events-conrent__item_edit">(<a href="">редактировать</a> / <a href="">удалить</a>)</span>
                    </div>
                    <!-- close .events-conrent__item -->
                </div>
                <div class="bookmarks__favorite-travels">
                    <h2>Избранные мероприятия</h2>
                    <?php foreach($userBookEvents as $item):?>
                        <div class="motoclub-content-promo-item">
                            <a href="<?=\yii\helpers\Url::to(['view','id'=>$item['events']->id])?>" class="motoclub-content-promo-pic">
                                <img src="<?= $item['events']->afisha?>" alt="">
                            </a>
                            <a href="<?=\yii\helpers\Url::to(['view','id'=>$item['events']->id])?>" class="button button_orange events-conrent__item_price"><?= \common\classes\EventsFunction::get_city_event($item['events']->city); ?></a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </article>
            <article class="kabinet__tabcontent  four">
                <!-- open .events-conrent__box -->
                <div class="events-conrent__box">
                    <!-- open .events-conrent__item -->
                    <?php foreach($eventsUser as $item): ?>
                        <div class="events-conrent__item">
                            <!-- open .events-conrent__item_thumb -->
                            <a href="<?=\yii\helpers\Url::to(['view','id'=>$model['id']])?>" class="events-conrent__item_thumb">
                                <img src="<?= $item->afisha?>" alt="" />
                            </a>
                            <!-- close .events-conrent__item_thumb -->
                            <a href="<?=\yii\helpers\Url::to(['view','id'=>$model['id']])?>" class="events-conrent__item_title"><?= $item->name; ?></a>
                            <span class="events-conrent__item_date"><?= \common\classes\DataHelper::rdate('d M', $item->dt_start); ?></span>
                            <a href="<?=\yii\helpers\Url::to(['view','id'=>$model['id']])?>" class="button button_orange events-conrent__item_price"><?= \common\classes\EventsFunction::get_city_event($item->city); ?></a>
                            <span class="events-conrent__item_edit">(<a href="">редактировать</a> / <a href="">удалить</a>)</span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- close .events-conrent__box -->
            </article>
            <article class="kabinet__tabcontent  five">
                <h2 class="article-title">Список статей</h2>
                <?php foreach($userPost as $item): ?>
                    <div class="item-article">
                        <a href="<?= \yii\helpers\Url::to(['/user_post/user_post/view', 'id' => $item->id])?>"><?= $item->title?></a>
                        <span class="item-article-date"><?= date('d.m.Y', $item->dt_add)?></span>
                        <span class="events-conrent__item_edit">(<a  href="<?= \yii\helpers\Url::to(['/user_post/user_post/update', 'id' => $item->id])?>">редактировать</a> / <a  href="<?= \yii\helpers\Url::to(['/user_post/user_post/delete', 'id' => $item->id])?>">удалить</a>)</span>
                    </div>
                <?php endforeach; ?>
            </article>
            <article class="kabinet__tabcontent  six">
                <div class="motoclub-content-promo">
                    <?php foreach($motoclubUser as $item): ?>
                        <div class="motoclub-content-promo-item">
                            <a href="<?= \yii\helpers\Url::to(['/moto_clubs/moto_clubs/view', 'id' => $item->id ])?>" class="motoclub-content-promo-pic">
                                <img src="<?= $item->logo; ?>" alt="">
                            </a>
                            <a href="<?= \yii\helpers\Url::to(['/moto_clubs/moto_clubs/view', 'id' => $item->id ])?>" class="button button_orange events-conrent__item_price"><?= \common\classes\EventsFunction::get_city_event($item->city_id); ?></a>
                            <span class="events-conrent__item_edit">(<a href="<?= \yii\helpers\Url::to(['/moto_clubs/moto_clubs/update', 'id' => $item->id ])?>">редактировать</a> / <a href="<?= \yii\helpers\Url::to(['/moto_clubs/moto_clubs/delete', 'id' => $item->id ])?>">удалить</a>)</span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?=\yii\helpers\Url::to('/moto_clubs/moto_clubs/application')?>" class="garage-add-bike-button button button_orange">Сделать заявку на мотоклуб</a>
            </article>
        </div>
    </div>
</section>
<section class="kabinet-photo">
    <div class="container">
        <h2>Мои фотографии</h2>
        <div class="gallery">
            <?php if(!empty($userAlbum)):?>
                <?php if(!empty($userImg)):?>
                    <?php foreach($userImg as $item): ?>
                        <a class="fancybox-thumb-2 gallery-items" rel="fancybox-thumb" href="/<?= $item->img; ?>" title="Rodeo Dusk (_JonathanMitchellPhotography_)">
                            <img src="/<?= $item->img; ?>" alt="">
                        </a>
                    <?php endforeach;?>
                <?php endif;?>
                <a href="<?= \yii\helpers\Url::to('/user_photo/user_photo/create')?>"  class="gallery-items add-photos"><span class="plus"></span>Добавить фото</a>
            <?php endif;?>

        </div>
        <div class="gallery-albums">
            <?php if(!empty($userAlbum)):?>
                <?php foreach($userAlbum as $item): ?>
                    <a href="#" class="link-albums"><?= $item->name; ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
            <a href="<?= \yii\helpers\Url::to(['/user_album/user_album/create'])?>"  class="gallery-items add-photos"><span class="plus"></span> Добавить альбом</a>
        </div>
    </div>
</section>