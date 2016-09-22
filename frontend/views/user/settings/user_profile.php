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
<section class="pa_section">
    <div class="container">
        <div class="pa pa_personal">

            <h3 class="name_edit" >Байкер <a href="<?= \yii\helpers\Url::to(['/user/settings/profile'])?>" class="edit">редактриовать</a></h3>
            <div class="photo-container">
                <img class="photo" src="<?= \common\classes\UserFunction::getUser_avatar_url()?>" alt="фото">
            </div>
            <div class="biker-info">
                <p class="fullname">Имя: <span><?= $user->username;?></span></p>
                <p class="nickname">Байкерское имя: <span><?= $user->road_nickname;?></span></p>
                <p class="city">Город: <span></span></p>
                <p class="age">Возраст: <span><?=date('Y')-date('Y',$user->birthday); ?></span></p>
            </div>
            <div class="clearfix"></div>
            <h3 class="garage-add-bike">Мой гараж</h3>
            <a href="<?= \yii\helpers\Url::to(['/garage'])?>" class="garage-add-bike-button button button_orange">Добавить байк</a>
            <?php foreach($userMoto as $item):
                //\common\classes\Debug::prn($item);
                ?>
                <div class="garage-form__in-garage_items">
                    <div class="moto-photo owl-bike">
                        <?php foreach($item['img_moto'] as $value): ?>
                            <div class="slide-bike"><img src="/<?= $value->img; ?>" alt="moto"></div>
                        <?php endforeach;?>

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
        </div>
        <div class="pa pa_events">
            <div class="border">
                <div class="events-item-left">
                    <h4>МОИ МОТОСТЛЕТЫ</h4>

                    <ul>
                        <?php if(empty($eventsUser)):?>
                            <li><?= Html::a('Добавить', ['/events/default/create'], ['class' => 'orange']); ?></li>
                        <?php else: ?>
                            <?php foreach($eventsUser as $item): ?>

                                <li><a href="<?= \yii\helpers\Url::to(['/events/default/view','id'=>$item->id]);?>"><?=$item->name; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <p>Я еду</p>
                    <ul>
                        <?php if(empty($userGoEvents)): ?>
                            <li><?= Html::a('Посмотреть мотокалендарь', ['/events/default/index'], ['class' => 'orange']); ?></li>
                        <?php else: ?>
                            <?php foreach($userGoEvents as $item): ?>
                                <li><a href="<?= \yii\helpers\Url::to(['/events/default/view','id'=>$item['events']->id]);?>"><?=$item['events']->name; ?></a></li>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </ul>
                    <p>Мотослеты из закладок</p>
                    <ul>
                        <?php if(empty($userBookEvents)): ?>
                            <li><?= Html::a('Посмотреть мотокалендарь', ['/events/default/index'], ['class' => 'orange']); ?></li>
                        <?php else: ?>
                            <?php foreach($userBookEvents as $item): ?>
                                <li><a href="<?= \yii\helpers\Url::to(['/events/default/view','id'=>$item['events']->id]);?>"><?=$item['events']->name; ?></a></li>
                            <?php endforeach;?>
                        <?php endif; ?>
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
                <a href="<?=\yii\helpers\Url::to('/clubs/default/create')?>" class="button button_orange">Заяка на мотоклуб</a>
                <a href="#" class="button button_orange add_dalnak">Добавить дальняк</a>
            </div>
            <!--<div class="border">
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
            </div>-->
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
</section>
