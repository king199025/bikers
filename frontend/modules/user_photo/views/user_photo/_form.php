<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\user_photo\models\UserPhoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-photo-form">

    <?php $form = ActiveForm::begin(
        ['options'=>
            [
                'enctype'=>'multipart/form-data'
            ]
        ]

    ); ?>

    <?= $form->field($model, 'album_id')->dropDownList(\yii\helpers\ArrayHelper::map($album, 'id', 'name')) ?>

    <?/*= $form->field($model, 'img')->textInput(['maxlength' => true]) */?>

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

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
