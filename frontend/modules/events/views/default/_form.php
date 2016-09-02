<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use sjaakp\taggable\TagEditor;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\db\Events */
/* @var $form yii\widgets\ActiveForm */

$to_list = ArrayHelper::map($typesList,'id','name');
?>

<section class="garage-form">
    <div class="container">
        <h2 class="garage-form-title">Мероприятие</h2>
        <div class="garage-form__add-baik">
            <h2 class="garage-form-title">Добавление нового мероприятия</h2>

    <?php $form = ActiveForm::begin(['options'=>['class'=>'garage-form__add-baik_form',
                                    'enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'name')->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Название'])->label(false) ?>
        <?=DatePicker::widget([
            'language' => 'ru',
            'id' => 'dt_start_event',
            'dateFormat' => 'dd.MM.yyyy',
            'options'=> [
                'class'=>'garage-form__add-baik_form_input',
                'placeholder'=>'Дата начала'
            ]
        ]) ?>
        <?= $form->field($model,'dt_start')->hiddenInput(['id'=>'event_start'])->label(false) ?>
        
        <?= DatePicker::widget([
            'language' => 'ru',
            'id' => 'dt_end_event',
            'dateFormat' => 'dd.MM.yyyy',
            'options'=> [
                'class'=>'garage-form__add-baik_form_input',
                'placeholder'=>'Дата окончания'
            ]
        ]) ?>
        <?= $form->field($model,'dt_start')->hiddenInput(['id'=>'event_end'])->label(false) ?>
        
        <?= $form->field($model, 'type')->dropDownList($to_list,['class'=>'garage-form__add-baik_form_input','placeholder'=>'Тип события'])->label(false)
                   
                    ?>
    <div class="garage-form__add-baik_form_input">
        <?= $form->field($model, 'editorTags')->widget(TagEditor::className(),[
            'tagEditorOptions' => [
                'autocomplete' => [
                    'source' => Url::toRoute(['tag/suggest'])
                ]
            ],

        ])->label(false) ?>
        </div>
        <?=
            AutoComplete::widget([
        'options' => [
            'class' => 'garage-form__add-baik_form_input',
            'placeholder' => 'Город',
            'id' => 'auto_complete_event_city',
        ],
        'clientOptions' => [
            'source' => $cityList,
            'minLength' => '3',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
        $('#auto_complete_event_city').val(ui.item.label);
        $('#event_city').val(ui.item.value).change();
        return false;
            }"
            )],
    ]);
        ?>
        <?= $form->field($model, 'city')->hiddenInput(['id'=>'event_city'])->label(false) ?>
    
        <?=
            AutoComplete::widget([
                'name'=>'auto_complete_event_city_near',
        'options' => [
            'class' => 'garage-form__add-baik_form_input',
            'placeholder' => 'Город',
            'id' => 'auto_complete_event_city_near',
        ],
        'clientOptions' => [
            'source' => $cityList,
            'minLength' => '3',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
        $('#auto_complete_event_city_near').val(ui.item.label);
        $('#event_city_near').val(ui.item.value).change();
        return false;
            }"
            )],
    ]);
        ?>
    
        <?= $form->field($model, 'city_near')->hiddenInput(['id'=>'event_city_near'])->label(false) ?>
        
        <?= AutoComplete::widget([
            'name'=>'auto_complete_event_organizer',
            'options' => [
                'class' => 'garage-form__add-baik_form_input',
                'placeholder' => 'Организатор',
                'id' => 'auto_complete_event_organizer',
            ],
            'clientOptions' => [
                'source' => $clubsList,
                'minLength' => '3',
                'autoFill' => true,
                'select' => new JsExpression("function( event, ui ) {
        $('#auto_complete_event_organizer').val(ui.item.label);
        $('#event_organizer').val(ui.item.value).change();
        return false;
            }")
            ],
        ]); ?>
    <?=Html::hiddenInput('event_organizer',null,['id'=>'event_organizer'])?>
        <?= $form->field($model, 'lon')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Долгота'])
            ->label(false)
        ?>
        <?= $form->field($model, 'lat')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Широта'])
            ->label(false) ?>
        <?= $form->field($model, 'site_url')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Адрес сайта'])
            ->label(false) ?>
        <?= $form->field($model, 'vk_url')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Ссылка vk'])
            ->label(false)?>
        <?= $form->field($model, 'ok_url')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Ссылка на одноклассники'])
            ->label(false) ?>
        <?= $form->field($model, 'fb_url')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Ссылка на facebook'])
            ->label(false)?>
        <?= $form->field($model, 'other_link1')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Другая ссылка(1)'])
            ->label(false)?>
        <?= $form->field($model, 'other_link2')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Другая ссылка(2)'])
            ->label(false)?>
        <?= $form->field($model, 'other_link3')
            ->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Другая ссылка(3)'])
            ->label(false)?>

        <?= $form->field($model, 'program')
            ->textarea(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Программа мероприятия'])
            ->label(false)?>

    <div class="block-add-file">
        <?= $form->field($model, 'afisha')->fileInput()->label('Добавить афишу') ?>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'garage-form__add-baik_form_knopka','id' => 'createEventButton']) ?>
        </div>
    <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>