<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\clubs\models\ClubsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clubs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_rus') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'filial') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'dt_start') ?>

    <?php // echo $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'group_vk') ?>

    <?php // echo $form->field($model, 'group_fb') ?>

    <?php // echo $form->field($model, 'group_ok') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
