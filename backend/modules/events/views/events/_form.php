<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\events\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput() ?>

    <?= $form->field($model, 'city_near')->textInput() ?>

    <?= $form->field($model, 'lon')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'dt_start')->textInput() ?>

    <?= $form->field($model, 'dt_end')->textInput() ?>

    <?= $form->field($model, 'site_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vk_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ok_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fb_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_link1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_link2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_link3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'afisha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'organizer')->textInput() ?>

    <?= $form->field($model, 'tags')->textInput() ?>

    <?= $form->field($model, 'program')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
