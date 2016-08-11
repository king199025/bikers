<?php

use yii\jui\AutoComplete;
use yii\web\JsExpression;




$number = rand();
?>
<div class="addCityDot select-where">
    <label for="city-<?= $number; ?>">Промежуточный город</label>
<?php



echo AutoComplete::widget([
        'id' => 'city-' . $number,
        'name' => 'dotCity[]',
            'options' => [
                'class' => 'whence',
                'placeholder' => 'Город',
            ],
        'clientOptions' => [
            'source' => $listdata,
            'minLength'=>'3',
            'autoFill'=>true,
            'select' => new JsExpression("function( event, ui ) {
                $('#city-' + $number).val(ui.item.label);
                $('#dotCityId-' + $number).val(ui.item.value).change();
										return false;
        }")],
    ]);

echo \yii\helpers\Html::hiddenInput('dotCityId[]', null, ['id' => 'dotCityId-' . $number, 'class' => 'ajaxCityDot']);


?>

    <span class="delCityDot">Удалить</span>
</div>