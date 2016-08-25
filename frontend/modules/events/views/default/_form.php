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

<div class="create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?=DatePicker::widget([
            'language' => 'ru',
            'id' => 'dt_start_event',
            'dateFormat' => 'dd.MM.yyyy'
        ]) ?>
        <?= $form->field($model,'dt_start')->hiddenInput(['id'=>'event_start'])->label(false) ?>
        
        <?= DatePicker::widget([
            'language' => 'ru',
            'id' => 'dt_end_event',
            'dateFormat' => 'dd.MM.yyyy'
        ]) ?>
        <?= $form->field($model,'dt_start')->hiddenInput(['id'=>'event_end'])->label(false) ?>
        
        <?= $form->field($model, 'type')->dropDownList($to_list)
                   
                    ?>
        <?= $form->field($model, 'editorTags')->widget(TagEditor::className(),[
            'tagEditorOptions' => [
                'autocomplete' => [
                    'source' => Url::toRoute(['tag/suggest'])
                ]
            ]
        ]) ?>
        <?=
            AutoComplete::widget([
        'options' => [
            /*'class' => '',*/
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
            /*'class' => '',*/
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