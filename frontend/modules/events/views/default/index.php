<?php

use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--<section class="events-calendar">
	<div class="container">
		<div class="events-calendar__control">
			<a href="#" class="events-calendar__control_link">показать все</a>
		</div>
		<div class="events-calendar__list">
			<a href="#nowhere" class="events-calendar__list_month events-calendar__list_month_checked">Январь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Февраль<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Март<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Апрель<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Май<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Июнь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Июль<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Август<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Сентябрь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Октябрь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Ноябрь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Декабрь<sup>42</sup></a>
		</div>
	</div>
</section>
<section class="events-category">
	<div class="container">
            <?php /*foreach($types as $type):*/?>
		<div class="events-category__item">
                    <input class="events-category_input" type="checkbox" name="events-category_<?/*=$type->id*/?>" id="events-category_<?/*=$type->id*/?>" />
			<label for="events-category_<?/*=$type->id*/?>">
				<span class="events-category__item_title"><em><?/*=$type->name*/?></em></span>
				<span class="events-category__item_marker"></span>
			</label>
		</div>
            <?php /*endforeach;*/?>
	</div>
</section>
<div class="events-conrent">
	<div class="container">
		<div class="events-conrent_wrap">
			<aside class="events-conrent__sidebar">
				<h4>Критерии поиска</h4>
				<?/*= $this->render('_search', [
				        'model' => $searchModel,
						'regions' => $regions
				    ]) */?>
				<div class="events-conrent__sidebar__box">
					<p class="events-conrent__sidebar__info">
						Всего мероприятий: <a href="#">51</a>
					</p>
					<p class="events-conrent__sidebar__info">
						Самые ближайшие: <a href="#">52</a>
					</p>
					<p class="events-conrent__sidebar__info">
						Самые дальние: <a href="#">53</a>
					</p>
					<p class="events-conrent__sidebar__info">
						Самые ожидаемые: <a href="#">54</a>
					</p>
					<p class="events-conrent__sidebar__info">
						Самые старые: <a href="#">55</a>
					</p>
					<br />
					<p class="events-conrent__sidebar__info">
						В архиве мероприятий: <a href="#">56</a>
					</p>
					<br />
					<p class="events-conrent__sidebar__info">
						МОИ ИЗБРАННЫЕ: <a href="#">57</a>
					</p>
				</div>
			</aside>
				<?/*= ListView::widget([
        			'dataProvider' => $dataProvider,
        			'itemView' => '_list',
        			'options' => [
        				'tag' => 'section',
        				'class' => 'events-conrent__box'
        			],
        			'itemOptions' => [
        				'tag' => 'div',
        				'class' => 'events-conrent__item',
        			],
        			'layout' => "{items}",
    			]); */?>
		</div>
	</div>
</div>-->

<!-- open .events-calendar -->
<section class="events-calendar">
	<!-- open .container -->
	<div class="container">
		<!-- open .events-calendar__control -->
		<div class="events-calendar__control">
			<a href="#" class="events-calendar__control_link">показать все</a>
		</div>
		<!-- close .events-calendar__control -->
		<!-- open .events-calendar__list -->
		<div class="events-calendar__list">
			<?php foreach ($eventMonth as $item): ?>
				<a href="#nowhere" class="events-calendar__list_month" data-month="<?= $item['month']; ?>"><?= $item['name']?><sup><?= $item['count']; ?></sup></a>
			<?php endforeach; ?>
			<!--<a href="#nowhere" class="events-calendar__list_month events-calendar__list_month_checked">Январь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Февраль<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Март<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Апрель<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Май<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Июнь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Июль<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Август<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Сентябрь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Октябрь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Ноябрь<sup>42</sup></a>
			<a href="#nowhere" class="events-calendar__list_month">Декабрь<sup>42</sup></a>-->
		</div>
		<!-- close .events-calendar__list -->
		<!-- open .events-calendar__control -->
		<!-- <div class="events-calendar__control">
			<a href="#" class="events-calendar__control_link ">архив</a>
		</div> -->
		<!-- close .events-calendar__control -->
	</div>
	<!-- close .container -->

</section>
<!-- close .events-calendar -->

<!-- open .events-category -->
<section class="events-category">
	<!-- open .container -->
	<div class="container">

		<?php foreach($types as $type):?>
		<div class="events-category__item">
			<input class="events-category_input" type="checkbox" data-id="<?=$type->id?>" name="events-category_<?=$type->id?>" id="events-category_<?=$type->id?>" />
			<label for="events-category_<?=$type->id?>">
				<span class="events-category__item_title"><em><?=$type->name?></em></span>
				<span class="events-category__item_marker"></span>
			</label>
		</div>
		<?php endforeach;?>

	</div>
	<!-- close .container -->

</section>
<!-- close .events-category -->

<!-- open .events-conrent -->
<div class="events-conrent">
	<!-- open .container -->
	<div class="container">
		<!-- open .events-conrent_wrap -->
		<div class="events-conrent_wrap">
			<!-- open .events-conrent__sidebar -->
			<aside class="events-conrent__sidebar">
				<h4>Критерии поиска</h4>
				<!-- open .events-conrent__sidebar__box -->
				<div class="events-conrent__sidebar__box">
					<!-- open .events-conrent__sidebar_control -->
					<div class="events-conrent__sidebar_control">
						<a href="<?=\yii\helpers\Url::to('/events/default')?>">Сбросить поиск</a>
						<?php if(!Yii::$app->user->isGuest): ?><a href="<?= \yii\helpers\Url::to(['create']);?>">Добавить слет</a><?php endif; ?>
					</div>
					<!-- close .events-conrent__sidebar_control -->

					<!-- open .events-conrent__form -->
					<form class="events-conrent__form">
						<!--<input type="text" class="events-conrent__form_inp  events-conrent__form_inp_lg" placeholder="Город ..."/>-->

						<?= AutoComplete::widget([
							'name' => 'city-search_widget',

							'options' => [
								'class' => 'events-conrent__form_inp  events-conrent__form_inp_lg',
								'placeholder' => 'Город...',
								'id' => 'city-search_widget',
							],
							'clientOptions' => [
								'source' => $cityList,
								'minLength'=>'3',
								'autoFill'=>true,
								'select' => new JsExpression("function( event, ui ) {
											$('#city-search_widget').val(ui.item.label);
											$('#city-search').val(ui.item.value).change();//#travel-city_start is the id of hiddenInput.
											return false;
										}"
								)
							],
						]);?>
						<?/*= $form->field($model, 'city_start')->hiddenInput()->label(false); */?>
						<input type="hidden" name="city-search" id="city-search">
						<input type="text" class="events-conrent__form_inp events-conrent__form_inp_md datepicker-inner dt_start_search_events" placeholder="Дата (от)"/>
						<input type="text" class="events-conrent__form_inp events-conrent__form_inp_md datepicker-inner dt_end_search_events" placeholder="Дата (до)"/>
						<input type="text" class="events-conrent__form_inp events-conrent__form_inp_lg" placeholder="Построение маршрута"/>

						<input type="text" class="events-conrent__form_inp events-conrent__form_inp_sm" placeholder="Радиус поиска"/>

					</form>
					<!-- close .events-conrent__form -->
					<small class="events-conrent__sidebar_date"><?= date('d.m.Y'); ?></small>
				</div>
				<!-- close .events-conrent__sidebar__box -->
				<!-- open .events-conrent__sidebar__box -->
				<div class="events-conrent__sidebar__box">
					<!-- open .events-conrent__sidebar__info -->
					<p class="events-conrent__sidebar__info">
						Всего мероприятий: <a href="#">51</a>
					</p>
					<!-- close .events-conrent__sidebar__info -->
					<!-- open .events-conrent__sidebar__info -->
					<p class="events-conrent__sidebar__info">
						Самые ближайшие: <a href="#">52</a>
					</p>
					<!-- close .events-conrent__sidebar__info -->
					<!-- open .events-conrent__sidebar__info -->
					<p class="events-conrent__sidebar__info">
						Самые дальние: <a href="#">53</a>
					</p>
					<!-- close .events-conrent__sidebar__info -->
					<!-- open .events-conrent__sidebar__info -->
					<p class="events-conrent__sidebar__info">
						Самые ожидаемые: <a href="#">54</a>
					</p>
					<!-- close .events-conrent__sidebar__info -->
					<!-- open .events-conrent__sidebar__info -->
					<p class="events-conrent__sidebar__info">
						Самые старые: <a href="#">55</a>
					</p>
					<!-- close .events-conrent__sidebar__info -->
					<br />
					<!-- open .events-conrent__sidebar__info -->
					<p class="events-conrent__sidebar__info">
						В архиве мероприятий: <a href="#">56</a>
					</p>
					<!-- close .events-conrent__sidebar__info -->
					<br />
					<!-- open .events-conrent__sidebar__info -->
					<p class="events-conrent__sidebar__info">
						МОИ ИЗБРАННЫЕ: <a href="#">57</a>
					</p>
					<!-- close .events-conrent__sidebar__info -->

				</div>
				<!-- close .events-conrent__sidebar__box -->
			</aside>
			<!-- close .events-conrent__sidebar -->
			<!-- open .events-conrent__box -->
			<section class="events-conrent__box">
				<?php foreach($events as $item): ?>
					<!-- open .events-conrent__item -->
					<div class="events-conrent__item">
						<!-- open .events-conrent__item_thumb -->
						<a href="<?=\yii\helpers\Url::to(['view','id'=>$item->id])?>" class="events-conrent__item_thumb">
							<img src="<?= $item->afisha?>" alt="" />
							<!--<span class="events-conrent__item_distance"><strong>2800</strong>км</span>-->
						</a>
						<!-- close .events-conrent__item_thumb -->
						<a href="<?= \yii\helpers\Url::to(['view','id'=>$item->id])?>" class="events-conrent__item_title"><?= $item->name; ?></a>
						<span class="events-conrent__item_date"><?= \common\classes\DataHelper::rdate('d M', $item->dt_start); ?></span>
						<a href="<?=\yii\helpers\Url::to(['view','id'=>$item->id])?>" class="button button_orange events-conrent__item_price"><?= \common\classes\EventsFunction::get_city_event($item->city); ?></a>
					</div>
					<!-- close .events-conrent__item -->
				<?php endforeach; ?>
			</section>
			<!-- close .events-conrent__box -->
		</div>
		<!-- close .events-conrent_wrap -->
	</div>
	<!-- close .container -->
</div>
<!-- close .events-conrent -->