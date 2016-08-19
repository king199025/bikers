<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- open .events-conrent__sidebar__box -->
<div class="events-conrent__sidebar__box">
    <!-- open .events-conrent__sidebar_control -->
    <div class="events-conrent__sidebar_control">
        <a id="reset_event_search" href="#">Сбросить поиск</a>
        <?= Html::a('Добавить слет', ['create']) ?>
    </div>
    <!-- close .events-conrent__sidebar_control -->

    <!-- open .events-conrent__form -->

    <form class="events-conrent__form">
        <input id="event_search_city" type="text" class="events-conrent__form_inp  events-conrent__form_inp_lg" placeholder="Город, мероприятие, организатор ..."/>
        <input id="date_search_event_from" type="text" class="events-conrent__form_inp events-conrent__form_inp_md datepicker-inner" placeholder="Дата (от)"/>
        <input id="date_search_event_to" type="text" class="events-conrent__form_inp events-conrent__form_inp_md datepicker-inner" placeholder="Дата (до)"/>
        <input type="text" class="events-conrent__form_inp events-conrent__form_inp_lg" placeholder="Построение маршрута"/>
        <input type="text" class="events-conrent__form_inp events-conrent__form_inp_sm" placeholder="Ближайшие"/>
        <input type="text" class="events-conrent__form_inp events-conrent__form_inp_sm" placeholder="Радиус поиска"/>
        <input type="text" class="events-conrent__form_inp events-conrent__form_inp_sm" placeholder="Регион"/>
    </form>
    <!-- close .events-conrent__form -->
    <small class="events-conrent__sidebar_date"> <?=date('j.m.Y')?></small>
</div>
<!-- close .events-conrent__sidebar__box -->

<div class="events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'events-conrent__form',
        ],
    ]); ?>

    <?= $form->field($model, 'word')
        ->textInput(['class' => 'events-conrent__form_inp  events-conrent__form_inp_lg']); ?>

    <?= $form->field($model, 'dt_from')
        ->textInput(['class' => 'events-conrent__form_inp events-conrent__form_inp_md datepicker-inner']); ?>

    <?= $form->field($model, 'dt_to')
        ->textInput(['class' => 'events-conrent__form_inp events-conrent__form_inp_md datepicker-inner']); ?>

    <?= $form->field($model, 'cities')
        ->textInput(['class' => 'events-conrent__form_inp events-conrent__form_inp_lg']); ?>

    <?= $form->field($model, 'is_near')
        ->textInput(['class' => 'events-conrent__form_inp events-conrent__form_inp_sm']); ?>

    <?= $form->field($model, 'radius')
        ->textInput(['class' => 'events-conrent__form_inp events-conrent__form_inp_sm']); ?>

    <?= $form->field($model, 'region')
        ->textInput(['class' => 'events-conrent__form_inp events-conrent__form_inp_sm']); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
