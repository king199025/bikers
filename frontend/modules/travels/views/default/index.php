<?php
$this->title = 'Путешествия';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="travels">
	<div class="container">
		<div class="travels__left-column">
				<form action="" class="travels__form">
					<button class="button button_orange button_travels">+ Добавить дальняк</button>
					<span class="travels__form_row">
						<label for="datapicker">Дата выезда</label>
						<input type="text" id="datapicker" class="travels__form_datepicker datepicker-inner" >

					</span>
					<div class="select-whence">
						<label for="">из</label>
						<select class="whence" name="">
							<option value="">Нефтюганск</option>
							<option value="">Нефтюганск1</option>
							<option value="">Нефтюганск2</option>
							<option value="">Нефтюганск3</option>
							<option value="">Нефтюганск4</option>
							<option value="">Нефтюганск5</option>
						</select>
					</div>
					<div class="select-where">
						<label for="">в</label>
						<select class="where" name="">
							<option value="">Москва</option>
							<option value="">Москва1</option>
							<option value="">Москва2</option>
							<option value="">Москва3</option>
							<option value="">Москва4</option>
							<option value="">Москва5</option>
						</select>
					</div>
				</form>
				<div class="travels__road">
					<h2 class="travels__road_title">Подробный маршрут / Через</h2>
					<div class="travels__road_left">
							<h3 class="travels__road_column-name">ТРАНЗИТНЫЙ ГОРОД</h3>
							<p>Химки - Абакан</p>
							<p>Севастополь - Новый Уренгой</p>
							<p>Химки - Абакан</p>
							<p>Севастополь - Новый Уренгой</p>
							<p>Химки - Абакан</p>
							<p>Севастополь - Новый Уренгой</p>
							<p>Химки - Абакан</p>
							<p>Севастополь - Новый Уренгой</p>
							<p>Химки - Абакан</p>
							<p>Севастополь - Новый Уренгой</p>
							<p>Химки - Абакан</p>
							<p>Севастополь - Новый Уренгой</p>
							<p>Химки - Абакан</p>
							<p>Севастополь - Новый Уренгой</p>
							<p>Химки - Абакан</p>
							<p>Севастополь - Новый Уренгой</p>
					</div>
					<div class="travels__road_right">
							<h3 class="travels__road_column-name travels__road_column-name-second">Дата прибытия</h3>
							<p>30.07.2016</p>
							<p>30.07.2016</p>
							<p>30.07.2016</p>
							<p>30.07.2016</p>
							<p>30.07.2016</p>
							<p>30.07.2016</p>
							<p>30.07.2016</p>
							<p>30.07.2016</p>
							<p>30.07.2016</p>
					</div>
				</div>
		</div>
		<div class="travels__right-column">
			<div id="travels__map"></div>
			<form action="" class="you-road">
				<div class="select-moto">
					<a href="" class="select-moto-link button button_gray"> Выбрать мотоцикл</a>
					<div class="events-category__item">
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
					</div>
				</div>
				<div class="road-name">
					<label class="road-name-label" for="">Название дальняка</label>
					<input class="road-name-input" type="text" name="name" value="">
					<label class="road-name-label" for="">Основной город назначения</label>
					<input class="road-name-input" type="text" name="name" value="">
				</div>
				<div class="knopka-otpravit">
					<button class="button button_orange save-dannie">Сохранить дальняк</button>
				</div>
			</form>
			</div>

		</div>

</section>