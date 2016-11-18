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

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Recover your password');
$this->params['breadcrumbs'][] = $this->title;
?>




<section class="authorization">
    <div class="container">
        <div class=" password-recovery_form">
            <h2>Для восстановления пароля заполните поле:</h2>
           <!-- <form action="" class="authorization_form" novalidate  method="post">
                <label for="">Email</label>
                <input class="form_line__email" type="text" name="name" >
                <button class="button button_orange">Продолжить</button>
            </form>-->
            <?php $form = ActiveForm::begin([
                'id'                     => 'password-recovery-form',
                'options' => ['class' => 'authorization_form'],
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'form_line__email']) ?>

            <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'button button_orange']) ?><br>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>
