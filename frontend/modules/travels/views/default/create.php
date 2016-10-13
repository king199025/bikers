<?php

/** @var $model common\models\db\Travel */

$url = \yii\helpers\Url::to(['citylist']);

// The widget
use common\models\db\City;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use frontend\modules\garage\widgets\UserActiveMoto;
//use kartik\widgets\Select2; // or kartik\select2\Select2
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;


$this->title = 'Создать путешествие';
$this->params['breadcrumbs'][] = ['label' => 'Путешествия', 'url' => ['#']];
$this->params['breadcrumbs'][] = $this->title;


// Get the initial city description
//$cityDesc = empty($model->city) ? '' : City::findOne($model->city)->description;
?>

<section class="travels">
	<div class="container">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'travels__form']]); ?>
		<div class="travels__left-column">
					<span class="travels__form_row">
						<!--<label for="datapicker">Дата выезда</label>
						<input type="text" id="datapicker" class="travels__form_datepicker datepicker-inner" >-->
						<?= $form->field($model, 'dt_start')
							->textInput(['id' =>'datapicker' ,'class' => 'travels__form_datepicker datepicker-inner'])
							->label('Дата старта')?>


					</span>
					<div class="select-whence">
						<label for="">из</label>
						<?= AutoComplete::widget([
							'name' => 'city-start',

								'options' => [
									'class' => 'whence',
									'placeholder' => 'Город',
									'id' => 'auto_complete_city_name_start',
								],
								'clientOptions' => [
									'source' => $cityList,
									'minLength'=>'3',
									'autoFill'=>true,
									'select' => new JsExpression("function( event, ui ) {
											$('#auto_complete_city_name_start').val(ui.item.label);
											$('#travel-city_start').val(ui.item.value).change();//#travel-city_start is the id of hiddenInput.
											return false;
										}"
									)],
							]);?>
						<?= $form->field($model, 'city_start')->hiddenInput()->label(false); ?>
					</div>
					<div class="select-where">
						<label for="">в</label>
						<?= AutoComplete::widget([
							'name' => 'city-end',
							'options' => [
								'class' => 'whence',
								'placeholder' => 'Город',
								'id' => 'auto_complete_city_name_end'
							],
							'clientOptions' => [
								'source' => $cityList,
								'minLength'=>'3',
								'autoFill'=>true,
								'select' => new JsExpression("function( event, ui ) {
										$('#auto_complete_city_name_end').val(ui.item.label);
										$('#travel-city_end').val(ui.item.value).change();//#travel-city_start is the id of hiddenInput.
										return false;
								}")],
						]);?>
						<?= $form->field($model, 'city_end')->hiddenInput()->label(false); ?>
					</div>
			<div id="aditoonalFields">

			</div>
			<span id="addPunkt">Добавить пункт назначения</span>

		</div>
		<div class="travels__right-column">
			<div id="travels__map"></div>
				<div class="select-moto">
					<div class="select-moto-link selectMoto button button_gray">Выбрать мотоцикл на котором Вы поедете</div>

					<?= $form->field($model, 'moto_id')->hiddenInput()->label(false); ?>



					<!--<div class="events-category__item">
						<input type="radio" name="events-category" id="events-category1">
						<label for="events-category1">
						<span class="events-category__item_marker"></span>
						<span class="events-category__item_title"><em>мопед с гаража</em></span>

						</label>
					</div>
					<div class="events-category__item">
						<input type="radio" name="events-category2" id="events-category2">
						<label for="events-category2">
						<span class="events-category__item_marker"></span>
						<span class="events-category__item_title"><em>мопед2 с гаража</em></span>

						</label>
					</div>
					<div class="events-category__item">
						<input type="radio" name="events-category2" id="events-category3">
						<label for="events-category3">
						<span class="events-category__item_marker"></span>
						<span class="events-category__item_title"><em>мопед3 с гаража</em></span>
						</label>
					</div>-->
				</div>
				<?= $form->field($model, 'distance')->textInput(['readonly' => true])?><span>км.</span>
				<?= $form->field($model, 'icon')->fileInput()->label('Добавить афишу') ?>
				<div class="road-name">
					<!--label class="road-name-label" for="">Название дальняка</label-->
					<!--input class="road-name-input" type="text" name="name" value=""-->
					<?= $form->field($model, 'name')->textInput(['class'=>'road-name-input'])->label('Название дальняка',['class'=>'road-name-label']); ?>
				</div>
				<div class="knopka-otpravit">
					<?=  \yii\bootstrap\Html::submitButton('Сохранить дальняк',['class'=>'button button_orange save-dannie']) ?>
					<!--button class="button button_orange save-dannie">Сохранить дальняк</button-->
				</div>
                            <div class="selectUserMoto modal">

                                <?php UserActiveMoto::begin(); ?>
                                <?php UserActiveMoto::end(); ?>
                            </div>
                <?php ActiveForm::end(); ?>
			</div>

		</div>

</section>

