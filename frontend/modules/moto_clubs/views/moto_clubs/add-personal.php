<?php
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

//\common\classes\Debug::prn($count);

?>


<div class="moto_clubs_people">
    <?= Html::label('Введите логин пользователя');?>
    <?= AutoComplete::widget([
        'name'=>'auto_complete_user_moto_club',
        'value' => '',
        'options' => [
            'class' => 'garage-form__add-baik_form_input',
            'placeholder' => 'Имя пользователя',
            'id' => "auto_complete_user_moto_club_$count",
        ],
        'clientOptions' => [
            'source' => $user,
            'minLength' => '2',
            'autoFill' => true,
            'select' => new JsExpression("function( event, ui ) {
                        $('#auto_complete_user_moto_club_$count').val(ui.item.label);
                        $('#user_id_people_$count').val(ui.item.value);
                        return false;
                    }"
            )],
    ]);
    ?>

    <?= Html::hiddenInput("moto_club_personal[$count][user_id_club]", null, ['id' => "user_id_people_$count"])?>
    <?= Html::label('Введите должность');?>
    <?= Html::textInput("moto_club_personal[$count][user_position]", '') ?>
    <?= Html::label('Введите страницу пользователя в социальной сети');?>
    <?= Html::textInput("moto_club_personal[$count][user_link_vk]", '') ?>
    <?= Html::label('Введите телефон пользователя');?>
    <?= Html::textInput("moto_club_personal[$count][user_phone]", '') ?>
</div>