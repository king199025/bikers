<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\GarageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="garage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'mark_id') ?>

    <?= $form->field($model, 'model_id') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'used') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
