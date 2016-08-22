<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\classes\Debug;
/* @var $this yii\web\View */
/* @var $model common\models\EventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- open .events-conrent__sidebar__box -->
<div class="events-conrent__sidebar__box">    

<!-- close .events-conrent__sidebar__box -->
<div class="events-conrent__sidebar_control">
        <a id="reset_event_search" href="#">Сбросить поиск</a>
    </div>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'events-conrent__form',
        ],
        'fieldConfig' => [
            'options' => [
                'tag'=>false
            ]
        ]
    ]); ?>
    <?= $form->field($model, 'word')
        ->textInput([
            'class' => 'events-conrent__form_inp  events-conrent__form_inp_lg',
            'placeholder' => 'Город, мероприятие, организатор ...'
            ])
        ->label(false); ?>

    <?= Html::textInput(null,null,
        [
            'id' =>'events_search_date_from' ,
            'class' => 'events-conrent__form_inp events-conrent__form_inp_md datepicker-inner',
            'placeholder' => 'Дата (от)'
        ])?>

    <?= $form->field($model, 'dt_from')
        ->hiddenInput(['id' => 'event_dt_from'])
        ->label(false); ?>

    <?= Html::textInput(null,null,
        [
            'id' =>'events_search_date_to' ,
            'class' => 'events-conrent__form_inp events-conrent__form_inp_md datepicker-inner',
            'placeholder' => 'Дата (до)'
        ])?>

    <?= $form->field($model, 'dt_to')
        ->hiddenInput(['id' => 'event_dt_to'])
        ->label(false); ?>

    <?= $form->field($model, 'cities')
        ->textInput([
            'class' => 'events-conrent__form_inp events-conrent__form_inp_lg',
            'placeholder' => 'Построение маршрута'
            ])
        ->label(false); ?>

    <?= $form->field($model, 'is_near')
        ->checkbox([
            'class' => 'events-conrent__form_inp events-conrent__form_inp_sm',
            ])
        ->label('Ближайшие'); ?>

    <?= $form->field($model, 'radius')
        ->textInput([
            'class' => 'events-conrent__form_inp events-conrent__form_inp_sm',
            'placeholder' => 'Радиус поиска'
            ])
        ->label(false); ?>

    <?= $form->field($model, 'region')
        ->textInput([
            'class' => 'events-conrent__form_inp events-conrent__form_inp_sm',
            'placeholder' => 'Регион'
            ])
        ->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'button button_orange']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>
    <small class="events-conrent__sidebar_date"><?=date('j.m.Y')?></small>
</div>