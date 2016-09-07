<?
//\common\classes\Debug::prn($bookmarks);
//die;
?>
<section class="pa_section">
    <div class="container">
        <div class="pa pa_personal">

            <h3 class="name_edit" >Байкер <a href="<?=\yii\helpers\Url::to('/user/settings/profile')?>" class="edit">редактировать</a></h3>
            <div class="photo-container">
                <img class="photo" src="<?=$model->profile->gravatar_id ? 'http://gravatar.com/avatar/'.$model->profile->gravatar_id : '/frontend/web/app/img/biker-avatar.png'?>" alt="фото">
            </div>
            <div class="biker-info">
                <p class="fullname">Имя: <span><?=$model->profile->name?></span></p>
                <p class="nickname">Байкерское имя: <span><?=$model->road_nickname?></span></p>
                <p class="city">Город: <span></span></p>
                <p class="age">Возраст: <span><?=date('Y')-date('Y',$model->birthday)?></span></p>
            </div>
            <div class="clearfix"></div>
            <h3 class="garage-add-bike">Мой гараж</h3>
            <a href="<?=\yii\helpers\Url::to('/garage/garage/create')?>" class="garage-add-bike-button button button_orange">Добавить байк</a>
            <?php \frontend\modules\garage\widgets\UserMoto::begin(); ?>
            <?php \frontend\modules\garage\widgets\UserMoto::end(); ?>


        </div>
        <div class="pa pa_events">
            <div class="border">
                <div class="events-item-left">
                    <h4>МОИ МОТОСТЛЕТЫ</h4>

                    <p>Завершенные мотослеты</p>
                    <ul>
                        <?php foreach ($events as $item):?>
                            <?php if($item['dt_start'] <= time()):?>
                                <li><a href="<?=\yii\helpers\Url::to(['/events/default/view','id'=>$item['id']])?>"><?=$item['name']?></a></li>
                            <?php endif?>
                        <?php endforeach;?>
                    </ul>
                    <p>Я еду</p>
                    <ul>
                        <?php foreach ($events as $item):?>
                            <?php if($item['dt_start'] > time()):?>
                                <li><a href="<?=\yii\helpers\Url::to(['/events/default/view','id'=>$item['id']])?>"><?=$item['name']?></a></li>
                            <?php endif?>
                        <?php endforeach;?>
                    </ul>
                    <p>Мотослеты из закладок</p>
                    <ul>
                        <?php foreach ($bookmarks as $item):?>
                            <li><a href="<?=\yii\helpers\Url::to(['/events/default/view','id'=>$item['event']])?>"><?=$item['event0']['name']?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="events-item-right">
                    <h4>МОИ ПУТЕШЕСТВИЯ</h4>
                    <p>Завершенные дальняки</p>
                    <ul>
                        <?php foreach ($travels as $item):?>
                            <?php if(strtotime($item['dt_start']) <= time()):?>
                                <li><a href="<?=\yii\helpers\Url::to(['/travels/default/view','id'=>$item['id']])?>"><?=$item['name']?></a></li>
                            <?php endif?>
                        <?php endforeach;?>
                    </ul>
                    <p>Планируемые дальняки</p>
                    <ul>
                        <?php foreach ($travels as $item):?>
                            <?php if(strtotime($item['dt_start']) > time()):?>
                                <li><a href="<?=\yii\helpers\Url::to(['/travels/default/view','id'=>$item['id']])?>"><?=$item['name']?></a></li>
                            <?php endif?>
                        <?php endforeach;?>
                    </ul>
                    <p>Дальняки из закладок</p>
                    <ul>
                        <?php foreach ($travel_bookmarks as $item):?>
                        <li><a href="<?=\yii\helpers\Url::to(['/events/default/view','id'=>$item['travel']])?>"><?=$item['travel0']['name']?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="events-control">
                <a href="<?=\yii\helpers\Url::to('/clubs/default/create')?>" class="button button_orange">Заяка на мотоклуб</a>
                <a href="<?=\yii\helpers\Url::to('/travels/default/create')?>" class="button button_orange add_dalnak">Добавить дальняк</a>
            </div>
            <!--div class="border">
                <div class="events-item-left">
                    <h4>Архив</h4>

                    <p>Завершенные мотослеты</p>
                    <ul>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                    </ul>
                </div>
                <div class="events-item-right">

                    <h4>Архив</h4>
                    <p>Отклоненные мотослеты</p>
                    <ul>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                        <li><a href="#">ПЕРВЫЙ</a></li>
                    </ul>

                </div>
            </div-->
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