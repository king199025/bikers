<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>

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
                    <input class="events-category_input" type="checkbox" name="events-category_<?=$type->id?>" id="events-category_<?=$type->id?>" />
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
				
				<?= $this->render('_search', [
				        'model' => $searchModel,
				    ]) ?>

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
				<?= ListView::widget([
        			'dataProvider' => $dataProvider,
        			//'filterModel' => $searchModel,
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
    			]); ?>
			<!-- close .events-conrent__box -->
		</div>
		<!-- close .events-conrent_wrap -->
	</div>
	<!-- close .container -->
</div>
<!-- close .events-conrent -->