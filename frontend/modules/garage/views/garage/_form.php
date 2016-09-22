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

            <?php $form = ActiveForm::begin([
                'action' => Url::to(['create']),
                'options' => [
                    'enctype'=>'multipart/form-data',
                    'class'=>'garage-form__add-baik_form'
                ]
            ]); ?>

            <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

            <?/*= $form->field($model, 'title')->textInput(['maxlength' => true]) */?>

            <?/*= $form->field($model, 'mark_id')->dropDownList(\yii\helpers\ArrayHelper::map($mark, 'id_car_mark', 'name'),['prompt' => 'Выберите марку мотоцикла']) */?>

            <?= $form->field($model, 'mark_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map($mark, 'id_car_mark', 'name'),
                'language' => 'ru',
                'theme' => Select2::THEME_DEFAULT,
                'options' => [
                    'placeholder' => 'Выберите марку мотоцикла',
                    'class' => 'garage-form__add-baik_form_input',
                ],
                'pluginOptions' => [
                    'allowClear' => false,
                    'class' => 'garage-form__add-baik_form_input',
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
            ])->label(false); ?>


            <?/*= $form->field($model, 'model_id')->dropDownList([], ['prompt' => 'Выберите модель мотоцикла']) */?>






            <?= $form->field($model, 'model_id')->widget(Select2::classname(), [
                'data' => !$model->isNewRecord ? \yii\helpers\ArrayHelper::map($carmodel, 'id_car_model', 'name') : [],
                'language' => 'ru',
                'theme' => Select2::THEME_DEFAULT,
                'options' => [
                    'placeholder' => 'Выберите модель мотоцикла',
                    'class' => 'garage-form__add-baik_form_input',
                ],
                'pluginOptions' => [
                    'allowClear' => false,
                    'class' => 'garage-form__add-baik_form_input',
                    /*'width' => '54%',*/

                ],

            ])->label(false);
            ?>

            <?= $form->field($model, 'year')->textInput([
                'class' => 'garage-form__add-baik_form_input',
                'placeholder' => 'год выпуска'
            ])->label(false) ?>

            <?= $form->field($model, 'volume')->textInput([
                'class' => 'garage-form__add-baik_form_input',
                'placeholder' => 'мощность двигателя'
            ])->label(false) ?>

            <?php
            $preview = [];
            $previewConfig = [];
            if(!$model->isNewRecord){
                foreach($img as $i){
                    $preview[] = "<img src='/$i->img' class='file-preview-image'>";
                    $previewConfig[] = [
                        'caption' => '',
                        'url' => '/events/default/delete_file?id=' . $i->id
                    ];
                }
            }


            echo '<div class="block-add-file">';

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
            </div>
        <div class="garage-form__add-baik_form_item">
            <input type="radio" name="Garage[used]" value="1" id="events-category2">
            <label for="events-category2">
                <span class="item_marker"></span>
                <span class="item_title"><em>Байк действующий</em></span>
            </label>
        </div>
        <div class="garage-form__add-baik_form_item">
            <input type="radio" name="Garage[used]" value="0" id="events-category3">
            <label for="events-category3">
                <span class="item_marker"></span>
                <span class="item_title"><em>Бывший мотоцикл</em></span>
            </label>
        </div>
        <?/*= $form->field($model, 'used')->radioList([
            '0' => 'Бывший мотоцикл',
            '1' => 'Действующий мотоцикл'
        ],[
            'item' => function($index, $label, $name, $checked, $value){
                $res =
                    '<div class="garage-form__add-baik_form_item">
                            <input type="radio" name="'.$name.'" id="events-category2" value="'.$value.' '.($checked ? 'checked' : '').'">
                            <label for="events-category2">
                                <span class="item_marker"></span>
                                <span class="item_title"><em>'.$label.'</em></span>
                            </label>
                        </div>';
                return $res;
            }
        ])->label(false) */?>

                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => 'garage-form__add-baik_form_knopka', 'id' => 'saveInfo']) ?>

            <?php ActiveForm::end(); ?>
            <!--form action="" class="garage-form__add-baik_form">
                <input type="text" class="garage-form__add-baik_form_input" placeholder="введите модель">
                <input type="text" class="garage-form__add-baik_form_input" placeholder="введите марку">
                <input type="text" class="garage-form__add-baik_form_input" placeholder="мощность двигателя">
                <input type="text" class="garage-form__add-baik_form_input" placeholder="год выпуска">
                <div class="garage-form__add-baik_form_item">
                    <input type="radio" name="events-category" id="events-category2">
                    <label for="events-category2">
                        <span class="item_marker"></span>
                        <span class="item_title"><em>Байк действующий</em></span>
                    </label>
                </div>
                <div class="garage-form__add-baik_form_item">
                    <input type="radio" name="events-category" id="events-category3">
                    <label for="events-category3">
                        <span class="item_marker"></span>
                        <span class="item_title"><em>Бывший мотоцикл</em></span>
                    </label>
                </div>
                <div class="block-add-file">
                    <label class="file_upload">
                        <span class="button">Добавить фото</span>
                        <mark>Файл не выбран</mark>
                        <input type="file">
                    </label>
                </div>
                <button class="garage-form__add-baik_form_knopka">Сохранить</button>
            </form-->

