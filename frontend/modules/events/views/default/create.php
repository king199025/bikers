<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\Events */
/* @var $form ActiveForm */
?>
<div class="create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'dt_start')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'ru',
]) ?>
        <?= $form->field($model, 'dt_end')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'ru',
]) ?>
        <?= $form->field($model, 'type')->dropDownList($typesList)
                   
                    ?>
        <?= $form->field($model, 'tags') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'city_near') ?>
        
        <?= $form->field($model, 'organizer') ?>
        <?= $form->field($model, 'lon') ?>
        <?= $form->field($model, 'lat') ?>
        <?= $form->field($model, 'site_url') ?>
        <?= $form->field($model, 'vk_url') ?>
        <?= $form->field($model, 'ok_url') ?>
        <?= $form->field($model, 'fb_url') ?>
        <?= $form->field($model, 'other_link1') ?>
        <?= $form->field($model, 'other_link2') ?>
        <?= $form->field($model, 'other_link3') ?>
        <?= $form->field($model, 'afisha') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- create -->