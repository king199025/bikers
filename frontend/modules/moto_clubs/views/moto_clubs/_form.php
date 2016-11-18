<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\moto_clubs\models\MotoClubs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="moto-clubs-form">

    <?php $form = ActiveForm::begin(
        ['options'=>
            [
                'enctype'=>'multipart/form-data'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'name_rus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(\yii\helpers\ArrayHelper::map($type, 'id', 'name')) ?>

    <?= $form->field($model, 'filial')->radioList(['1' => 'Да', '2' => 'Нет']) ?>
    <?=
    AutoComplete::widget([
        'name'=>'auto_complete_event_city_near',
        'value' => \common\classes\EventsFunction::get_city_event($model->city_id),
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
        $('#club_city').val(ui.item.value);
        return false;
            }"
            )],
    ]);
    ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->fileInput()->label('Добавить логотип') ?>
    <?= $form->field($model, 'logo')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'dt_start')->widget(\yii\jui\DatePicker::classname(), []) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_vk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_fb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_ok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <h2>Загрузите фотографии мотоклуба</h2>
    <?php
    $preview = [];
    $previewConfig = [];

    if(!$model->isNewRecord){
        foreach($img as $i){
            $preview[] = "<img src='/$i->img' class='file-preview-image'>";
            $previewConfig[] = [
                'caption' => '',
                'url' => '/secure/about/default/delete_file?id=' . $i->id
            ];
        }
    }

    //echo '<label class="control-label">Добавить фото</label>';


    echo FileInput::widget([
        'name' => 'file[]',
        'id' => 'input-5',
        'attribute' => 'attachment_1',
        'value' => '@frontend/media/img/1.png',
        'options' => [
            'multiple' => true,
            'showCaption' => false,
            'showUpload' => false,
            'uploadAsync'=> false,
        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['/moto_clubs/moto_clubs/upload_file?id='.$_GET['id']]),
            'language' => "ru",
            'previewClass' => 'hasEdit',
            'uploadAsync'=> false,
            'showUpload' => false,
            'dropZoneEnabled' => false,
            'overwriteInitial' => false,
            'initialPreview' => $preview,
            'initialPreviewConfig' => $previewConfig
        ],
    ]);

    ?>

    <h2>Сотрудники мотоклуба</h2>

    <div class="moto_clubs_people_wr">
        <div class="moto_clubs_people">
            <?= Html::label('Введите логин пользователя');?>
            <?=
            AutoComplete::widget([
                'name'=>'auto_complete_user_moto_club',
                'value' => '',
                'options' => [
                    'class' => 'garage-form__add-baik_form_input',
                    'placeholder' => 'Имя пользователя',
                    'id' => 'auto_complete_user_moto_club',
                ],
                'clientOptions' => [
                    'source' => $user,
                    'minLength' => '2',
                    'autoFill' => true,
                    'select' => new JsExpression("function( event, ui ) {
                        $('#auto_complete_user_moto_club').val(ui.item.label);
                        $('#user_id_people').val(ui.item.value);
                        return false;
                    }"
                    )],
            ]);
            ?>

            <?= Html::hiddenInput("moto_club_personal[1][user_id_club]", null, ['id' => 'user_id_people'])?>
            <?= Html::label('Введите должность');?>
            <?= Html::textInput('moto_club_personal[1][user_position]', '') ?>
            <?= Html::label('Введите страницу пользователя в социальной сети');?>
            <?= Html::textInput('moto_club_personal[1][user_link_vk]', '') ?>
            <?= Html::label('Введите телефон пользователя');?>
            <?= Html::textInput('moto_club_personal[1][user_phone]', '') ?>
        </div>
        <?= Html::button('Добавить сотрудника', ['id' => 'add_personal', 'class' => 'btn btn-success', 'data-count' => 1])?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'saveInfo']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
