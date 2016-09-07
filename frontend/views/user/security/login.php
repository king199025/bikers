<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<section class="authorization">
    <div class="container">
            <div class="authorization_form_cont">
                <?php $form = ActiveForm::begin([
                    'class'                  => 'authorization_form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                    'validateOnType'         => false,
                    'validateOnChange'       => false,
                    'fieldConfig' => [
                        'template' => "{input}",
                        'options' => [
                            'tag' => false,
                        ],
                    ],
                ]) ?>

                <?= $form->field($model, 'login', [
                    'inputOptions' => [
                        'autofocus' => 'autofocus',
                        'class' => 'form_line__email',
                        'placeholder' => 'Введите ваш email-адрес'
                    ]
                ])->label(false); ?>

                <?= $form->field($model, 'password', [
                    'inputOptions' => [
                        'class' => 'form_line__password',
                        'placeholder' => 'Пароль'
                    ]
                ])->passwordInput()
                    ->label(false) ?>
                <?=$module->enablePasswordRecovery ? Html::a(
                    Yii::t('user', 'Forgot password?'),
                    ['/user/recovery/request'],
                    ['class' => 'forgot_your_pass_']) : ''?>


                <?= Html::submitButton('Войти', [
                    'class' => 'js_headerAuto modal_button login',
                ]) ?>

                <?php ActiveForm::end(); ?>

        </div>
        <div class="after-form">
        <?php if ($module->enableConfirmation): ?>
                <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
        <?php endif ?>
        <?php if ($module->enableRegistration): ?>
                <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
        <?php endif ?>
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
        </div>
    </div>
</section>
