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

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<section class="settings-account">
    <div class="container">
        <div class="settings-mnu">
            <h3>Настройки Профиля</h3>
            <div class="settings-mnu__items button button_orange" >ПРОФИЛЬ</div>
            <a class="settings-mnu__items" href="<?=\yii\helpers\Url::to('account')?>">АККАУНТ</a>
        </div>
        <div class="settings-account-form">
            <h4>Настройки профиля</h4>
            <?php $form = \yii\widgets\ActiveForm::begin([
                'id' => 'profile-form',
                #'options' => ['class' => ''],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'validateOnBlur'         => false,
            ]); ?>

            <?/*= $form->field($model, 'name')
                ->textInput(['class'=>'settings-account-form_item','placeholder'=>'Имя'])
                ->label(false) */?>

            <?/*= $form->field($model, 'public_email')
                ->textInput(['class'=>'settings-account-form_item','placeholder'=>'Публичный email'])
                ->label(false) */?>

            <?/*= $form->field($model, 'website')
                ->textInput(['class'=>'settings-account-form_item','placeholder'=>'Вебсайт'])
                ->label(false) */?>

            <?= $form->field($model, 'location')
                ->textInput(['class'=>'settings-account-form_item','placeholder'=>'Местоположение'])
                ->label(false) ?>

           <!-- --><?/*= $form->field($model, 'gravatar_email')
                ->hint(\yii\helpers\Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com'))
                ->textInput(['class'=>'settings-account-form_item','placeholder'=>'Gravatar email'])
                ->label(false) */?>

            <div class="avataPrifile">

                <?php
                if(empty($model->avatar)){
                    echo $form->field($model, 'avatar', [
                        'template' => '{label}<div class="selectAvatar">
                                    <img id="blah" src="/img/default_avatar_male.jpg" alt="" width="160px">
                                    <span>Нажмите для выбора</span>{input}</div>'
                    ])->label('Загрузить аватар с компютера')->fileInput();
                }
                else{
                    echo $form->field($model, 'avatar', [
                        'template' => '{label}<div class="selectAvatar">
                                    <img id="blah" src="'. $model->avatar .'" alt="" width="160px">
                                    <span>Нажмите для выбора</span>{input}</div>'
                    ])->label('Загрузить аватар с компютера')->fileInput();
                }
                ?>

            </div>


            <?= $form->field($model, 'bio')
                ->textarea(['class'=>'settings-profile-form_item-textarea','placeholder'=>'О себе'])
                ->label(false)?>

            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">
                    <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Сохранить'), ['class' => 'button button_orange subm']) ?><br>
                </div>
            </div>

            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>

</section>
