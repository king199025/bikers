<!-- @@block  =  content-->
<main>
    <!-- open .howitworks -->
    <section class="howitworks">
        <!-- open .container -->
        <div class="container">

            <h3 class="pokazat">Как это работает</h3>
            <div class="howitworks-hide">
                <p>Как же это всем нам знакомо: выезжаешь на мероприятия в другой город в одиночку, минуты кажутся часами. <br />
                    А если едешь в незнакомое место то даже не знаешь, где можно остановиться по-пути или у кого попросить помощи
                    в случае какой-нибудь неприятности. Но теперь это все в прошлом!</p>

                <!-- open .howitworks__flex -->
                <div class="howitworks__flex">
                    <!-- open .howitworks__item -->
                    <div class="howitworks__item">
                        <img src="img/arrows.png" alt="" />
                        <h4>Ищите попутчиков</h4>
                        <p>Теперь вам не будет скучно в дороге. Ищите мотоциклистов, которые будут проезжать по вашему маршруту и объеденяйтесь в одну большую колонну.</p>
                    </div>
                    <!-- close .howitworks__item -->
                    <!-- open .howitworks__item -->
                    <div class="howitworks__item">
                        <!-- open .howitworks__item_icon -->
                        <div class="howitworks__item_icon">
                            <img src="img/route.png" alt="" />
                        </div>
                        <!-- close .howitworks__item_icon -->
                        <h4>Стройте маршруты</h4>
                        <p>Прямо сейчас проложить маршрут вашего путешествия и поделитесь им с друзьями или другими участниками мотосообщества.</p>
                        <a href="#">Попробуйте прямо сейчас</a>
                    </div>
                    <!-- close .howitworks__item -->
                    <!-- open .howitworks__item -->
                    <div class="howitworks__item">
                        <!-- open .howitworks__item_icon -->
                        <div class="howitworks__item_icon">
                            <img src="img/calendar.png" alt="" />
                        </div>
                        <!-- close .howitworks__item_icon -->
                        <h4>Мотокалендарь</h4>
                        <p>Узнайте обо всех мероприятиях! Воспользуйтесь мотокалендарем и мы покажем вам всю информацию о каком-либо мероприятии и как на него удобнее проехать. </p>
                    </div>
                    <!-- close .howitworks__item -->
                    <!-- open .howitworks__item -->
                    <div class="howitworks__item">
                        <!-- open .howitworks__item_icon -->
                        <div class="howitworks__item_icon">
                            <img src="img/people-4.png" alt="" />
                        </div>
                        <!-- close .howitworks__item_icon -->
                        <h4>Общайтесь!</h4>
                        <p>Общайтесь внутри сообщества с другими участвовать проекта, знакомтесь с новыми людьми, встречайтесь на мероприятиях!</p>
                    </div>
                    <!-- close .howitworks__item -->
                    <!-- open .howitworks__item -->
                    <div class="howitworks__item">
                        <img src="img/people-1.png" alt="" />
                        <h4>Мой гараж</h4>
                        <p>Вы можете рассказать другим участникам сообщества о своей технике, которая есть у вас в гараже и поделиться описанием процесса внесения тех или иных улучшений.</p>
                    </div>
                    <!-- close .howitworks__item -->
                    <!-- open .howitworks__item -->
                    <div class="howitworks__item">
                        <!-- open .howitworks__item_icon -->
                        <div class="howitworks__item_icon">
                            <img src="img/people-2.png" alt="" />
                        </div>
                        <!-- close .howitworks__item_icon -->
                        <h4>Знакомства</h4>
                        <p>Больше путешествий - больше новых друзей! Чем больше вы проедете, тем выше ваш рейтинг. Станьте лучшим и получайте новые возможности.</p>
                    </div>
                    <!-- close .howitworks__item -->
                    <!-- open .howitworks__item -->
                    <div class="howitworks__item">
                        <!-- open .howitworks__item_icon -->
                        <div class="howitworks__item_icon">
                            <img src="img/meeting.png" alt="" />
                        </div>
                        <!-- close .howitworks__item_icon -->
                        <h4>Организаторам</h4>
                        <p>Вы организуете мероприятие? Разместите информацию у нас и о нем узнает еще больше людей! Отличная помощь в организации.</p>
                    </div>
                    <!-- close .howitworks__item -->
                    <!-- open .howitworks__item -->
                    <div class="howitworks__item">
                        <!-- open .howitworks__item_icon -->
                        <div class="howitworks__item_icon">
                            <img src="img/clipboard-with-pencil.png" alt="" />
                        </div>
                        <!-- close .howitworks__item_icon -->
                        <h4>Регистрируйтесь</h4>
                        <p> Создайте своей аккаунт и пользуйтесь всеми сервисами абсолютно БЕЗ ГРАНИЦ!</p>
                    </div>
                    <!-- close .howitworks__item -->
                </div>
                <!-- close .howitworks__flex -->
            </div>
        </div>
        <!-- close .container -->
    </section>
    <!-- close .howitworks -->

    <?php \frontend\modules\news\widgets\ShowBlockNews::begin();
          \frontend\modules\news\widgets\ShowBlockNews::end(); ?>

    <!-- open .route -->
    <section class="route">
        <!-- open .container -->
        <div class="container">
            <!-- open .route__wrap -->
            <div class="route__wrap">
                <!-- open .route__text -->
                <div class="route__text">
                    <h3>Проложить свой маршрут</h3>
                    <p>Прямо сейчас Вы можете проложить свой маршрут путешествия и сразу же найти желающих поехать вместе с Вами или присоединиться к Вам в пути.</p>
                </div>
                <!-- close .route__text -->
                <!-- open .route__destination -->
                <div class="route__destination">
                    <!-- open .route__destination_box -->
                    <div class="route__destination_box">
                        <span class="icon icon_marker icon_marker-blue"></span>
                        <input type="text" name="route__destination_a" class="route__destination_inp" placeholder="Укажите населенный пункт" />
                        <span class="icon icon_correct">
    						<svg xmlns="http://www.w3.org/2000/svg" viewBox="-49 200.2 512 393.5">
								<path class="st0" d="M450.8 227.2L436 212.4c-16.2-16.3-42.8-16.3-59.1 0L126 463.4l-89-89c-16.2-16.2-42.8-16.2-59.1 0l-14.8 14.7c-16.2 16.2-16.2 42.8 0 59.1L96.4 581.6c16.2 16.2 42.8 16.2 59.1 0l295.4-295.4c16.1-16.2 16.1-42.8-.1-59z"/>
							</svg>
						</span>
                    </div>
                    <!-- close .route__destination_box -->
                    <!-- open .route__destination_box -->
                    <div class="route__destination_box">
                        <span class="icon icon_marker icon_marker-red"></span>
                        <input type="text" name="route__destination_b" class="route__destination_inp"placeholder="Введите название точки пибытия" />
                        <span class="icon_discorrect">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982" width="100%" height="100%">
								<path d="M131.804 106.491l75.936-75.936c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.491 81.18 30.554 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.989 6.99-6.989 18.323 0 25.312l75.937 75.936-75.937 75.937c-6.989 6.99-6.989 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0l75.937-75.937 75.937 75.937c6.989 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.322 0-25.312l-75.936-75.936z" fill="#D80027" fill-rule="evenodd" clip-rule="evenodd"/>
							</svg>
    					</span>
                    </div>
                    <!-- close .route__destination_box -->
                </div>
                <!-- close .route__destination -->
                <!-- open .route__go -->
                <div class="route__go">
                    <a href="<?=\yii\helpers\Url::to('travels/default/create')?>" class="button button_orange"><span class="icon icon_road"></span>ПРОЛОЖИТЬ МАРШРУТ</a>
                </div>
                <!-- close .route__go -->

            </div>
            <!-- close .route__wrap -->
        </div>
        <!-- close .container -->
    </section>
    <!-- close .route -->

    <?php \frontend\modules\events\widgets\ShowBlockEvents::begin();
    \frontend\modules\events\widgets\ShowBlockEvents::end();?>

<?php
\frontend\modules\events\widgets\ShowFindEvents::begin();
\frontend\modules\events\widgets\ShowFindEvents::end();
?>

    <!-- open .statistics -->
    <section class="statistics">
        <!-- open .container -->
        <div class="container">
            <!-- open .statistics__flex -->
            <div class="statistics__flex">
                <!-- open .statistic__box -->
                <div class="statistics__box">
                    <h3>Статистика </h3>
                    <!-- open .statistics__table -->
                    <div class="statistics__table">
                        <!-- open .statistics__line -->
                        <div class="statistics__line">
	    					<span class="statistics__line_title">
	    						Lorem ipsum dolor.
	    					</span>
                            <span>1448 байкеров</span>
                        </div>
                        <!-- close .statistics__line -->
                        <!-- open .statistics__line -->
                        <div class="statistics__line">
	    					<span class="statistics__line_title">
	    					Lorem ipsum.
	    					</span>
                            <span>12358</span>
                        </div>
                        <!-- close .statistics__line -->
                        <!-- open .statistics__line -->
                        <div class="statistics__line">
	    					<span class="statistics__line_title">
	    					Lorem.
	    					</span>
                            <span>
	    						<a href="#">Lorem ipsum.</a>
	    					</span>
                        </div>
                        <!-- close .statistics__line -->
                    </div>
                    <!-- close .statistics__table -->
                </div>
                <!-- close .statistic__box -->
                <!-- open .statistic__box -->
                <div class="statistics__box">
                    <h3>Топ 10 городов</h3>
                    <!-- open .statistics__table -->
                    <div class="statistics__table">
                        <!-- open .statistics__line -->
                        <div class="statistics__line">
	    					<span class="statistics__line_title">
	    						Lorem ipsum dolor.
	    					</span>
                            <span>1448 байкеров</span>
                        </div>
                        <!-- close .statistics__line -->
                        <!-- open .statistics__line -->
                        <div class="statistics__line">
	    					<span class="statistics__line_title">
	    					Lorem ipsum.
	    					</span>
                            <span>12358</span>
                        </div>
                        <!-- close .statistics__line -->
                        <!-- open .statistics__line -->
                        <div class="statistics__line">
	    					<span class="statistics__line_title">
	    					Lorem.
	    					</span>
                            <span>
	    						<a href="#">Lorem ipsum.</a>
	    					</span>
                        </div>
                        <!-- close .statistics__line -->
                    </div>
                    <!-- close .statistics__table -->
                </div>
                <!-- close .statistic__box -->
                <!-- open .statistic__box -->
                <div class="statistics__box">
                    <!-- open .statistics__blog -->
                    <div class="statistics__blog">
                        <h4>Мотоблог сообщества</h4>
                        <!-- open .statistics__blog_item -->
                        <div class="statistics__blog_item">
                            <a href="#" class="statistics__blog_title">Post title</a>
                            <small>10.07.2016</small>
                            <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p>
                        </div>
                        <!-- close .statistics__blog_item -->
                        <!-- open .statistics__blog_item -->
                        <div class="statistics__blog_item">
                            <a href="#" class="statistics__blog_title">Post title</a>
                            <small>10.07.2016</small>
                            <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p>
                        </div>
                        <!-- close .statistics__blog_item -->
                        <!-- open .statistics__blog_item -->
                        <div class="statistics__blog_item">
                            <a href="#" class="statistics__blog_title">Post title</a>
                            <small>10.07.2016</small>
                            <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.</p>
                        </div>
                        <!-- close .statistics__blog_item -->
                        <a href="#" class="statistics__blog_more">Больше статей</a>
                    </div>
                    <!-- close .statistics__blog -->
                </div>
                <!-- close .statistic__box -->
                <a href="#" class="button button_border">Мотоклубы</a>
            </div>
            <!-- close .statistics__flex -->
        </div>
        <!-- close .container -->
    </section>
    <!-- close .statistics -->

    <!-- open .clubs -->
    <section class="club">
        <!-- open .container -->
        <div class="container">
            <a href="#" class="club__item">
                <img src="img/023e49bfd2faaacfe0c6ac277e28698f.jpg" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/car_logo_PNG1666.png" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/car_logo_PNG1661.png" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/023e49bfd2faaacfe0c6ac277e28698f.jpg" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/car_logo_PNG1666.png" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/car_logo_PNG1661.png" alt="" />
            </a>

            <a href="#" class="club__item">
                <img src="img/car_logo_PNG1666.png" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/023e49bfd2faaacfe0c6ac277e28698f.jpg" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/car_logo_PNG1661.png" alt="" />
            </a>

            <a href="#" class="club__item">
                <img src="img/car_logo_PNG1666.png" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/023e49bfd2faaacfe0c6ac277e28698f.jpg" alt="" />
            </a>
            <a href="#" class="club__item">
                <img src="img/car_logo_PNG1661.png" alt="" />
            </a>
        </div>
        <!-- close .container -->
    </section>
    <!-- close .clubs -->
</main>