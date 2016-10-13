<?php

use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\moto_clubs\models\MotoClubs */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="garage-form">
    <div class="container">
        <h2 class="garage-form-title">Клуб</h2>
        <div class="garage-form__add-baik">
            <h2 class="garage-form-title">Заявка на добавление мотоклуба</h2>

            <?php $form = ActiveForm::begin(
                ['options'=>
                    [
                        'enctype'=>'multipart/form-data'
                    ]
                ]
            ); ?>

            <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false)?>

            <?= $form->field($model, 'name_rus')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'type')->dropDownList(\yii\helpers\ArrayHelper::map($type, 'id', 'name')) ?>

            <?= $form->field($model, 'filial')->radioList(['1' => 'Да', '2' => 'Нет']) ?>

            <?= $form->field($model, 'city_id')->hiddenInput(['id'=>'club_city'])->label(false) ?>

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
        $('#club_city').val(ui.item.value);
        return false;
            }"
                    )],
            ]);
            ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?/*= $form->field($model, 'logo')->textInput(['maxlength' => true]) */?>
            <?= $form->field($model, 'logo')->fileInput()->label('Добавить логотип') ?>
            <?= $form->field($model, 'dt_start')->widget(\yii\jui\DatePicker::classname(), []) ?>

            <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'group_vk')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'group_fb')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'group_ok')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

            <?/*= $form->field($model, 'description')->textarea(['rows' => 6]) */?>

            <?/*= $form->field($model, 'slug')->textInput(['maxlength' => true]) */?><!--

            --><?/*= $form->field($model, 'status')->textInput() */?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>

