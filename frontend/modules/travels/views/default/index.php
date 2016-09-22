<?php

use common\classes\Debug;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

$this->title = 'Путешествия';
$this->params['breadcrumbs'][] = $this->title;
//Debug::prn($travels);
?>
<section class="travels">
    <div class="container">
        <div class="travels__left-column">
            <form action="" class="travels__form">
                <?php if(!Yii::$app->user->isGuest):?>
                    <a href="/travels/default/create" class="button button_orange button_travels">+ Добавить дальняк</a>
                <?php endif;?>
                <span class="travels__form_row">
                    <label for="datapicker">Дата выезда</label>
                    <input type="text" id="datapicker" class="travels__form_datepicker datepicker-inner tarvel_search" >

                </span>
                <div class="select-whence">
                    <input type="hidden" id="travel-citystart">
                    
                    <label for="">из</label>
                    <?=
                    AutoComplete::widget([
                        'name' => 'city-start',
                        'options' => [
                            'class' => 'whence',
                            'placeholder' => 'Город',
                            'id' => 'autocomplete_city_name_start',
                        ],
                        'clientOptions' => [
                            'source' => $cityList,
                            'minLength' => '3',
                            'autoFill' => true,
                            'select' => new JsExpression("function( event, ui ) {
				$('#autocomplete_city_name_start').val(ui.item.label);
				$('#travel-citystart').val(ui.item.value).change();//#travel-city_start is the id of hiddenInput.
				return false;
                            }")],
                    ]);
                    ?>
                </div>
                <div class="select-where">
                    <input type="hidden" id="travel-cityend">
                    <label for="">в</label>
                    <?=
                    AutoComplete::widget([
                        'name' => 'city-end',
                        'options' => [
                            'class' => 'whence',
                            'placeholder' => 'Город',
                            'id' => 'autocomplete_city_name_end'
                        ],
                        'clientOptions' => [
                            'source' => $cityList,
                            'minLength' => '3',
                            'autoFill' => true,
                            'select' => new JsExpression("function( event, ui ) {
				$('#autocomplete_city_name_end').val(ui.item.label);
                                $('#travel-cityend').val(ui.item.value).change();//#travel-city_start is the id of hiddenInput.
				return false;
			}")],
                    ]);
                    ?>
                </div>
            </form>
            <div class="travels__road">
                <h2 class="travels__road_title">Список путешествий</h2>
                <div class="travels__road_left">
                    <h3 class="travels__road_column-name">Название</h3>
                    <?php foreach ($travels as $item): ?>
                        <div class="travelName" id="<?= $item['id'] ?>"><?= $item['name'] ?>
                        <?php 
                        $cityS = '';
                        $cityEn = '';
                        foreach ($cityList as $it){
                            if($it['value'] == $item['city_start'])
                            {
                                $cityS = $it['label'];
                                break;
                            }
                            
                        }
                        foreach ($cityList as $it){
                            if($it['value'] == $item['city_end'])
                                {
                                    $cityEn = $it['label'];
                                    break;
                                }
                        }
                        ?>
                        <p><?=$cityS?> - <?=$cityEn?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="travels__road_right">
                    <h3 class="travels__road_column-name travels__road_column-name-second">Дата выезда</h3>
                    <?php foreach ($travels as $item): ?>
                        <p><?= $item['dt_start'] ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="travels__right-column">
            <div id="travels__map"></div>
            <div id="travels__travel">


            </div>

        </div>


</section>