<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\helpers\Url;

$to_list = ArrayHelper::map($types,'id','name');
?>
<div class="create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>
    <?=
    AutoComplete::widget([
        'name' => 'city_name',
        'options' => [
            'class' => 'whence',
            'placeholder' => 'Город',
            'id' => 'auto_complete_city_name',
        ],
        'clientOptions' => [
            'source' => $cityList,
            'minLength' => '3',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
		$('#auto_complete_city_name').val(ui.item.label);
		$('#club-city').val(ui.item.value).change();//#travel-city_start is the id of hiddenInput.
		return false;
            }"
            )],
    ]);
    ?>
    <?= $form->field($model, 'type')->dropDownList($to_list); ?>
    <?php 
        echo '<label class="control-label">Добавить фото</label>';
        echo FileInput::widget([
            'name' => 'promo',
            'id' => 'input-5',
            'options' => [
                'multiple' => false,
                'showCaption' => false,
                'showUpload' => false,
                'uploadAsync'=> false,
            ],
            'pluginOptions' => [
                'uploadUrl' => Url::to(['/frontend/web/img/upload']),
                'language' => "ru",
                'previewClass' => 'hasEdit',
                'uploadAsync'=> false,
                'showUpload' => false,
                'dropZoneEnabled' => false,
                'overwriteInitial' => false,
                'previewFileType' => 'any',
            ],
        ]);
    ?>
    <?= $form->field($model, 'city')->hiddenInput(['id'=>'club-city'])->label(false); ?>
    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'skype') ?>
    <?= $form->field($model, 'lon') ?>
    <?= $form->field($model, 'lat') ?>
    <?= $form->field($model, 'site_url') ?>
    <?= $form->field($model, 'vk_url') ?>
    <?= $form->field($model, 'ok_url') ?>
    <?= $form->field($model, 'fb_url') ?>
    <?= $form->field($model, 'photos') ?>
<?= $form->field($model, 'about') ?>

    <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

</div>