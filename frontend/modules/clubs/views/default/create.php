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
<section class="garage-form">
    <div class="container">
        <h2 class="garage-form-title">Клуб</h2>
        <div class="garage-form__add-baik">
            <h2 class="garage-form-title">Добавление нового клуба</h2>

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Название'])
        ->label(false); ?>
    <?=
    AutoComplete::widget([
        'name' => 'city_name',
        'options' => [
            /*'class' => '',*/
            'placeholder' => 'Город',
            'id' => 'auto_complete_city_name',
            'class' => 'garage-form__add-baik_form_input',
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
    <?= $form->field($model, 'type')->dropDownList($to_list,['class'=>'garage-form__add-baik_form_input'])->label(false); ?>
    <div class="block-add-file">
    <?php
        echo '<label class="">Добавить промо-картинку</label>';
        echo $form->field($model, 'promo')->widget(
            FileInput::className(),
            ['options' => ['accept' => 'image/*','class'=>'file_upload']]
        )->label(false);
    ?>
        </div>
    <?= $form->field($model, 'city')
        ->hiddenInput(['id'=>'club-city'])
        ->label(false); ?>
    <?= $form->field($model, 'phone')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Номер телефона'])
        ->label(false); ?>

    <?= $form->field($model, 'email')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'E-mail'])
        ->label(false); ?>
    <?= $form->field($model, 'skype')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Skype'])
        ->label(false); ?>
    <?= $form->field($model, 'lon')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Долгота'])
        ->label(false); ?>
    <?= $form->field($model, 'lat')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Широта'])
        ->label(false); ?>
    <?= $form->field($model, 'site_url')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Адрес сайта'])
        ->label(false);?>
    <?= $form->field($model, 'vk_url')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Адрес vk'])
        ->label(false); ?>
    <?= $form->field($model, 'ok_url')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Адрес odnoklassniki'])
        ->label(false);; ?>
    <?= $form->field($model, 'fb_url')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Адрес facebook'])
        ->label(false); ?>
    <?= $form->field($model, 'photos')
        ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Фотографии'])
        ->label(false); ?>
<?= $form->field($model, 'about')
    ->textarea(['class'=>'garage-form__add-baik_form_input','placeholder'=>'О клубе'])->label(false); ?>
    <?= Html::textInput('crtd',null,[
        'id' =>'datapicker' ,
        'class' => 'clubs__form_datepicker datepicker-inner garage-form__add-baik_form_input',
        'placeholder'=>'Дата создания'])?>
    <?=$form->field($model,'created')->hiddenInput(['id'=>'club_created'])->label(false);?>
    <div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'garage-form__add-baik_form_knopka']) ?>
    </div>
<?php ActiveForm::end(); ?>

        </div>
    </div>
</section>