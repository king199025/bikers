<?php

use kartik\select2\Select2;
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
        <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>
        <?= $form->field($model, 'name')->textInput(['class'=>'garage-form__add-baik_form_input','placeholder'=>'Название']) ?>
         <?= '<label class="control-label">Дата начала</label>'?>
            <?=DatePicker::widget([
            'language' => 'ru',
            'id' => 'dt_start_event',
            'dateFormat' => 'dd.MM.yyyy',
            'options'=> [
                'class'=>'garage-form__add-baik_form_input',
                'placeholder'=>'Дата начала',

            ]
        ]) ?>
        <?= $form->field($model,'dt_start')->hiddenInput(['id'=>'event_start'])->label(false) ?>

            <?= '<label class="control-label">Дата окончания</label>'?>
        <?= DatePicker::widget([
            'language' => 'ru',
            'id' => 'dt_end_event',
            'dateFormat' => 'dd.MM.yyyy',
            'options'=> [
                'class'=>'garage-form__add-baik_form_input',
                'placeholder'=>'Дата окончания'
            ]
        ]) ?>
        <?= $form->field($model,'dt_end')->hiddenInput(['id'=>'event_end'])->label(false) ?>
        
        <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map($typesList, 'id', 'name'),
            ['class'=>'garage-form__add-baik_form_input','prompt'=>'Выберите тип события'])
                   
                    ?>

        <?/*= $form->field($model, 'editorTags')->widget(TagEditor::className(),[
            'tagEditorOptions' => [
                'autocomplete' => [
                    'source' => Url::toRoute(['tag/suggest'])
                ]
            ],

        ])->label(false) */?>

        <?php echo '<label class="">Теги</label>';
        echo Select2::widget([
        'name' => 'tags',
        'value' => '', // initial value
        'data' => [],
        'options' => ['placeholder' => 'Введите теги...', 'multiple' => true],
        'pluginOptions' => [
        'tags' => true,
        'maximumInputLength' => 10
        ],
        ]);
        ?>


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

            <?php echo '<label class="">Организаторы</label>';
            echo Select2::widget([
                'name' => 'event_organizer',
                'value' => '', // initial value
                'data' => ArrayHelper::map($clubsList, 'id', 'name_rus'),
                'options' => ['placeholder' => 'Выберите организаторов...', 'multiple' => true],
                'pluginOptions' => [
                    'maximumInputLength' => 100
                ],
            ]);
            ?>

        <?/*= AutoComplete::widget([
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
        ]); */?><!--
    <?/*=Html::hiddenInput('event_organizer',null,['id'=>'event_organizer'])*/?>
        -->
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
            <?php
            if(!$model->isNewRecord)
            {
                $preview = [];
                $previewConfig = [];

                foreach($img as $i){
                    $preview[] = "<img src='/$i->img' class='file-preview-image'>";
                    $previewConfig[] = [
                        'caption' => '',
                        'url' => '/garage/garage/delete_file?id=' . $i->id
                    ];
                }




                echo '<label class="control-label">Добавить фото</label>';
                echo \kartik\file\FileInput::widget([
                    'name' => 'file[]',
                    'id' => 'input-5',
                    'attribute' => 'attachment_1',
                    'value' => '/media/img/1.png',
                    'options' => [
                        'multiple' => true,
                        'showCaption' => false,
                        'showUpload' => false,
                        'uploadAsync'=> false,
                    ],
                    'pluginOptions' => [
                        'uploadUrl' => Url::to(['/events/default/upload_file']),
                        'language' => "ru",
                        'previewClass' => 'hasEdit',
                        'uploadAsync'=> false,
                        'showUpload' => false,
                        'dropZoneEnabled' => false,
                        /*'initialPreviewShowDelete' => true,*/
                        'overwriteInitial' => false,
                        'initialPreview' => $preview,
                        'initialPreviewConfig' => $previewConfig
                    ],
                ]);
            }
            ?>
        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'garage-form__add-baik_form_knopka','id' => 'createEventButton']) ?>
        </div>
    <?php ActiveForm::end(); ?>

        </div>

</section>