<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\events\models\EventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'city_near') ?>

    <?= $form->field($model, 'lon') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'dt_start') ?>

    <?php // echo $form->field($model, 'dt_end') ?>

    <?php // echo $form->field($model, 'site_url') ?>

    <?php // echo $form->field($model, 'vk_url') ?>

    <?php // echo $form->field($model, 'ok_url') ?>

    <?php // echo $form->field($model, 'fb_url') ?>

    <?php // echo $form->field($model, 'other_link1') ?>

    <?php // echo $form->field($model, 'other_link2') ?>

    <?php // echo $form->field($model, 'other_link3') ?>

    <?php // echo $form->field($model, 'afisha') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'organizer') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'program') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
