<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View                   $this
 * @var yii\widgets\ActiveForm         $form
 * @var dektrium\user\models\LoginForm $model
 * @var string                         $action
 */

?>

<?php if (Yii::$app->user->isGuest): ?>
    <?php $form = ActiveForm::begin([
        'id'                     => 'login-widget-form',
        'options' => ['class' => 'modal_form'],
        'action'                 => Url::to(['/user/security/login']),
        'enableAjaxValidation'   => true,
        'enableClientValidation' => false,
        'validateOnBlur'         => false,
        'validateOnType'         => false,
        'validateOnChange'       => false,

    ]) ?>

    <?= $form->field($model, 'login')->textInput(['placeholder' => 'Введите ваш email-адрес', 'class' => 'form_line__email'])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль', 'class' => 'form_line__password'])->label(false) ?>


    <a href="<?= Url::to(['/register'])?>" class="regist">Регистрация</a>
    <a href="<?= Url::to(['/forgot'])?>" class="forgot_your_pass">Забыли пароль</a>

    <?= Html::submitButton('Войти', ['class' => 'js_headerAuto modal_button close']) ?>

    <?php ActiveForm::end(); ?>
<?php else: ?>
    <?= Html::a(Yii::t('user', 'Logout'), ['/user/security/logout'], [
        'class'       => 'btn btn-danger btn-block',
        'data-method' => 'post'
    ]) ?>
<?php endif ?>
