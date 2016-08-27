<?
//\common\classes\Debug::prn($profile);
//die;
?>

<section class="pa_section">
    <div class="container">
        <div class="pa pa_personal">

            <h3 class="name_edit" >Байкер <a href="#" class="edit">редактриовать</a></h3>
            <div class="photo-container">
                <img class="photo" src="/frontend/web/img/biker-avatar.png" alt="фото">
            </div>
            <div class="biker-info">
                <p class="fullname">Имя: <span><?=$profile->name?></span></p>
                <p class="nickname">Байкерское имя: <span><?=$model->road_nickname?></span></p>
                <p class="city">Город: <span></span></p>
                <p class="age">Возраст: <span><?=date('Y')-date('Y',$model->birthday)?></span></p>
            </div>
            <div class="clearfix"></div>
            <h3 class="garage-add-bike">Мой гараж</h3>
            <a href="<?=\yii\helpers\Url::to('/garage/garage/create')?>" class="garage-add-bike-button button button_orange">Добавить байк</a>



            <?php \frontend\modules\garage\widgets\UserMoto::begin(); ?>
            <?php \frontend\modules\garage\widgets\UserMoto::end(); ?>
            <!--div class="moto-photo">
                <img src="img/moto.png" alt="moto">
            </div>
            <div class="bike-info">
                <p class="model">Модель <span>ХХХ</span></p>
                <p class="make">Марка <span>ХХХ</span></p>
                <p class="power-engine">Мощность двигателя <span>5554</span></p>
                <p class="active-bike"><span>Байк действующий</span></p>
            </div>

            <div class="moto-photo">
                <img src="/frontend/web/img/moto.png" alt="moto">
            </div>

            <div class="bike-info">
                <p class="model">Модель <span>ХХХ</span></p>
                <p class="make">Марка <span>ХХХ</span></p>
                <p class="power-engine">Мощность двигателя <span>5554</span></p>
                <p class="active-bike"><span>Байк действующий</span></p>
            </div-->


        </div>
        <div class="pa pa_events">
            <div class="border">
                <div class="events-item">
                    <h4>МОИ МОТОСТЛЕТЫ</h4>

                    <p>Завершенные мотослеты</p>
                    <ul>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                    </ul>
                    <h4>МОИ ПУТЕШЕСТВИЯ</h4>
                    <p>Завершенные дальняки</p>
                    <ul>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                    </ul>

                </div>
                <div class="events-item">
                    <p>Я еду</p>
                    <ul>
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
                </div>
                <div class="events-item">
                    <p>Мотослеты из закладок</p>
                    <ul>
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
                <a href="#" class="button button_orange"><?=\yii\helpers\Url::to('/clubs/default/create')?></a>
                <a href="#" class="button button_orange add_dalnak"><?=\yii\helpers\Url::to('/travels/default/create')?></a>
            </div>
        </div>
        <div class="pa-little pa_buttons">
            <a href="#" class="pa_button button button_gray">Настройки оповещений</a>
            <a href="#" class="pa_button button button_gray">Сообщения</a>
            <a href="#" class="pa_button button button_gray">Мои закладки</a>

        </div>
        <!--  <div class="clearfix"></div>
        <div class="empty-block"></div>-->
        <div class="comments">
            <a href="#" class="comments-button button button_gray">Отзывы байкеров</a>
        </div>

    </div>
</section>