<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?/*= Html::encode($this->title) */?></h3>
            </div>
            <div class="panel-body">

            </div>
        </div>
        <p class="text-center">
            <?/*= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) */?>
        </p>
    </div>
</div>-->


<section class="registration">
    <div class="container">
        <?php $form = ActiveForm::begin([
            'id'                     => 'registration-form',
            'options' => ['class' => 'regist-form'],
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,


            'fieldConfig' => [
                'template' => '<div class="form-row">{input}<div class="error">{error}</div></div>',
                'inputOptions' => ['class' => 'form-input'],
                'labelOptions' => ['class' => '']
            ],

        ]); ?>
        <h2>Регистрация</h2>


        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите ваш email-адрес']) ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Имя']) ?>
        <?= $form->field($model, 'road_nickname')->textInput(['placeholder' => 'Байкерское имя']) ?>
        <?php if ($module->enableGeneratingPassword == false): ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
        <?php endif ?>



        <label class="bday" for="">День рождения</label>
        <select name="day" class="day">
            <option value="-1"></option>
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>
        <select name="month" class="month">
            <option value="-1"></option>
            <option value="01">Январь</option>
            <option value="02">Февраль</option>
            <option value="03">Март</option>
            <option value="04">Апрель</option>
            <option value="05">Май</option>
            <option value="06">Июнь</option>
            <option value="07">Июль</option>
            <option value="08">Август</option>
            <option value="09">Сентябрь</option>
            <option value="10">Октябрь</option>
            <option value="11">Ноябрь</option>
            <option value="12">Декабрь</option>
        </select>
        <input class="year" type="number" name="year" >


        <?= $form->field($model, 'floor')->radioList([1 => 'мужской', 0 => 'женский'])?>


        <!--<div class="events-category__item">
            <input type="radio" name="register-form[floor]" id="events-category2" value="1">
            <label for="events-category2">
                <span class="events-category__item_marker"></span>
                <span class="events-category__item_title"><em>мужской</em></span>

            </label>
        </div>
        <div class="events-category__item">
            <input type="radio" name="register-form[floor]" id="events-category3" value="0">
            <label for="events-category3">
                <span class="events-category__item_marker"></span>
                <span class="events-category__item_title"><em>женский</em></span>

            </label>
        </div>-->




        <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'regist-button']) ?>

        <?php ActiveForm::end(); ?>
       <!-- <form action="" class="regist-form">
            <h2>Регистрация</h2>
            <input class="form-input" type="text" name="name" placeholder="Имя">
            <input class="form-input" type="tel" name="name" placeholder="Байкерское имя">
            <input class="form-input" type="text" name="email" placeholder="Введите ваш email-адрес">
            <input class="form-input" type="tel" name="password" placeholder="Пароль">
            <input class="form-input" type="text" name="password" placeholder="Повторите пароль">
            <label class="bday" for="">День рождения</label>
            <select name="day" class="day">
                <option value="-1"></option>
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <select name="month" class="month">
                <option value="-1"></option>
                <option value="01">Январь</option>
                <option value="02">Февраль</option>
                <option value="03">Март</option>
                <option value="04">Апрель</option>
                <option value="05">Май</option>
                <option value="06">Июнь</option>
                <option value="07">Июль</option>
                <option value="08">Август</option>
                <option value="09">Сентябрь</option>
                <option value="10">Октябрь</option>
                <option value="11">Ноябрь</option>
                <option value="12">Декабрь</option>
            </select>
            <input class="year" type="name" name="name" >
            <!-- <input class="input-radio" type="radio" name="group1" value="man" id="man" checked>
            <label class="radio-label" for="man"><span></span>мужской</label>
            <input class="input-radio" type="radio" name="group1" value="women" id="women" >
            <label class="radio-label" for="women"><span></span>женский</label>
            <div class="events-category__item">
                <input type="radio" name="events-category" id="events-category2">
                <label for="events-category2">
                    <span class="events-category__item_marker"></span>
                    <span class="events-category__item_title"><em>мужской</em></span>

                </label>
            </div>
            <div class="events-category__item">
                <input type="radio" name="events-category" id="events-category3">
                <label for="events-category3">
                    <span class="events-category__item_marker"></span>
                    <span class="events-category__item_title"><em>женский</em></span>

                </label>
            </div>
            <button class="regist-button">Регистрация</button>
        </form>-->
        <div class="about-registration">
            <h3 class="about-registration-title">Ваши действия и предоставляемая вами информация</h3>
            <p class="about-registration-text">
                Мы не собираем материалы и другую предоставляемую вами информацию. <br>
                Вся информация о Пользователе в открытом доступе, и контролируется самим Пользователем. В том числе, создание материалов их публикация и взаимодействие с другими Пользователями. <br>
                Вы в праве ограничить просмотр важной информации в настройках аккаунта. <br>
                Мы так же не собираем информацию о том, как вы используете данный ресурс, например: виды просматриваемых материалов или материалы, с которыми вы взаимодействуете.
            </p>
            <h3 class="about-registration-title">Нажимая кнопку "Регистрация".</h3>
            <p class="about-registration-text">
                Вы соглашаетесь с Условиями сервиса и подтверждаете, что ознакомились с его Политикой.
                <br>Администрация в праве удалить любую размещенную вами информацию без объяснения причины.
                <br>Администрация не гарантирует сохранность информации, размещённой Пользователем, а также бесперебойную работу информационного ресурса.
                <br>Аминистрация не защищает ваши права и права других или третьих лиц.
                <br>В случае, если Пользователем была размещена информация, всю полноту ответственности за её размещение несёт Пользователь.
                <br>Вы не будете пользоваться сервисом, если вам меньше 16 лет.
                <br>Вы в праве предоставить ложную информацию при регистрации.
            </p>
            <h3 class="about-registration-title">Правила поведения.</h3>
            <p class="about-registration-text">
                Не материться и не грубить в переписке и постах (наше законодательство будет ругать нас за это, а не тебя).
                <br>Не заниматься спамом и обманом (этот сайт сделан для живых и честных людей).
                <br>Не нарушать ПДД (просьба…).
                <br>Никогда не отказывать в помощи другим — ведь мы все мотобратья и дорога у нас одна на всех!
            </p>
        </div>
    </div>
</section>
