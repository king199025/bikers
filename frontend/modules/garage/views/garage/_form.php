<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\Garage */
/* @var $form yii\widgets\ActiveForm */
/* @var $mark common\models\db\CarMark */
?>

<div class="garage-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

    <?/*= $form->field($model, 'title')->textInput(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'mark_id')->dropDownList(\yii\helpers\ArrayHelper::map($mark, 'id_car_mark', 'name'),['prompt' => 'Выберите марку мотоцикла']) */?>

    <?= $form->field($model, 'mark_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($mark, 'id_car_mark', 'name'),
        'language' => 'ru',
        'theme' => Select2::THEME_DEFAULT,
        'options' => [
            'placeholder' => 'Выберите марку мотоцикла',
            'class' => 'selectMarkId',
        ],
        'pluginOptions' => [
            'allowClear' => false,
            'class' => 'selectMarkId',
            /*'width' => '100%',*/

        ],
        'pluginEvents' => [
            "change" => "function() {
                     var id = $(this).val();
                     $('#garage-model_id').html('Выберите модель мотоцикла');
                     console.log(id);
                     $.ajax({
                        type: 'POST',
                        url: '/garage/garage/show_select_model',
                        data: 'id=' + id,
                        success: function (data) {
                            var arr = JSON.parse(data);

                            $(\"#garage-model_id\").empty();
                            $(\"#garage-model_id\").append( $('<option value=\"\">Выберите город</option>'));
                            $.each(arr, function(key, value) {
                                $(\"#garage-model_id\").append( $('<option value=\"' + key + '\">' + value + '</option>'));
                           });
                           $(\"#select2-ads-city_id-result-3pxi-1\").remove();

                        }

                 })
                 }",

        ]
    ]) ?>


    <?/*= $form->field($model, 'model_id')->dropDownList([], ['prompt' => 'Выберите модель мотоцикла']) */?>






    <?= $form->field($model, 'model_id')->widget(Select2::classname(), [
        'data' => !$model->isNewRecord ? \yii\helpers\ArrayHelper::map($carmodel, 'id_car_model', 'name') : [],
        'language' => 'ru',
        'theme' => Select2::THEME_DEFAULT,
        'options' => [
            'placeholder' => 'Выберите модель мотоцикла',
            'class' => '',
        ],
        'pluginOptions' => [
            'allowClear' => false,
            'class' => '',
            /*'width' => '54%',*/

        ],

    ]);
    ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?php
    if(!$model->isNewRecord){
        foreach($img as $i){
            $preview[] = "<img src='/$i->img' class='file-preview-image'>";
            $previewConfig[] = [
                'caption' => '',
                'url' => '/garage/garage/delete_file?id=' . $i->id
            ];
        }
    }

    echo '<label class="control-label">Добавить фото</label>';
    echo FileInput::widget([
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
            'uploadUrl' => Url::to(['/garage/garage/upload_file']),
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
    ?>
    <?= $form->field($model, 'used')->radioList(['0' => 'Бывший мотоцикл', '1' => 'Действующий мотоцикл']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'saveInfo']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
