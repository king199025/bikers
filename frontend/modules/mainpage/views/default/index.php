<!-- @@block  =  content-->


<!-- tabs test -->
<section class="main-page__tabs_first">
    <div class="container">
        <!-- open tabs -->
        <nav class="title__tabs">
            <ul>
                <li>
                    <a href="#" class="page__tabs_target_first " data-tab="one_first">
                        <span>Новости</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="page__tabs_target_first page__tabs_first_active" data-tab="two_first">
                        <span>Мотокалендарь</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="page__tabs_target_first" data-tab="three_first">
                        <span>Как это работает</span>
                    </a>
                </li>

            </ul>
        </nav>
        <div class="box-connent">
            <?= \frontend\modules\news\widgets\ShowBlockNews::widget(); ?>


            <?= \frontend\modules\events\widgets\ShowBlockEvents::widget(); ?>
            <article class="page__tabcontent_first  three_first">
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
            </article>
        </div>
    </div>
</section>
<!-- tabs test -->


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
                <a href="#" class="button button_orange"><span class="icon icon_road"></span>ПРОЛОЖИТЬ МАРШРУТ</a>
            </div>
            <!-- close .route__go -->

        </div>
        <!-- close .route__wrap -->
    </div>
    <!-- close .container -->
</section>
<!-- close .route -->

<section class="main-page__tabs">
    <div class="container">
        <!-- open tabs -->
        <nav class="title__tabs">
            <ul>
                <li>
                    <a href="#" class="page__tabs_target " data-tab="one">
                        <span>ПУТЕШЕСТВИЯ</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="page__tabs_target page__tabs_active" data-tab="two">
                        <span>НАША СТАТИСТИКА</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="page__tabs_target" data-tab="three">
                        <span>МОТОКЛУБЫ</span>
                    </a>
                </li>

            </ul>
        </nav>
        <div class="box-connent">
            <?= \frontend\modules\travels\widgets\ShowHomeTravel::widget(); ?>


            <article class="page__tabcontent two">
                <div class="column">
                    <h3>Мотоциклисты</h3>
                    <div class="statistic__item">
                        <div  class="statistic__item_wrapper">
                            <p>Всего</p>
                            <p>Клубные</p>
                            <p>Фрирайдеры</p>
                        </div>
                        <div class="statistic__item_wrapper">
                            <p>Чопперисты</p>
                            <p>Турист</p>
                            <p>Спортсмены</p>
                        </div>
                        <div class="statistic__item_wrapper">
                            <p>ТОП-100 Путешественников</p>
                            <p>ТОП-100 Мотоциклистов</p>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h3>Путешествия</h3>
                    <div class="statistic__item">
                        <div  class="statistic__item_wrapper">
                            <p>Всего</p>
                            <p>Клубные</p>
                            <p>Фрирайдеры</p>
                        </div>
                        <div class="statistic__item_wrapper">
                            <p>Чопперисты</p>
                            <p>Турист</p>
                            <p>Спортсмены</p>
                        </div>
                        <div class="statistic__item_wrapper">
                            <p>ТОП-100 Путешественников</p>
                            <p>ТОП-100 Мотоциклистов</p>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h3>Мотослеты</h3>
                    <div class="statistic__item">
                        <div  class="statistic__item_wrapper">
                            <p>Всего</p>
                            <p>Клубные</p>
                            <p>Фрирайдеры</p>
                        </div>
                        <div class="statistic__item_wrapper">
                            <p>Чопперисты</p>
                            <p>Турист</p>
                            <p>Спортсмены</p>
                        </div>
                        <div class="statistic__item_wrapper">
                            <p>ТОП-100 Путешественников</p>
                            <p>ТОП-100 Мотоциклистов</p>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h3>Мотоклубы</h3>
                    <div class="statistic__item">
                        <div  class="statistic__item_wrapper">
                            <p>Всего</p>
                            <p>Клубные</p>
                            <p>Фрирайдеры</p>
                        </div>
                        <div class="statistic__item_wrapper">
                            <p>Чопперисты</p>
                            <p>Турист</p>
                            <p>Спортсмены</p>
                        </div>
                        <div class="statistic__item_wrapper">
                            <p>ТОП-100 Путешественников</p>
                            <p>ТОП-100 Мотоциклистов</p>
                        </div>
                    </div>
                </div>
            </article>
            <article class="page__tabcontent  three">
                <div class="motoclub-search">
                    <input type="text" name="navigation__search_box " class="navigation__search_box motoclub-search-input" placeholder="Поиск: название, город, область, страна ">
                    <a href="#" class="navigation__search_icon motoclub-search-pic">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 250.313 250.313"><path d="M244.186 214.604l-54.379-54.378c-.289-.289-.628-.491-.93-.76 10.7-16.231 16.945-35.66 16.945-56.554C205.822 46.075 159.747 0 102.911 0S0 46.075 0 102.911c0 56.835 46.074 102.911 102.91 102.911 20.895 0 40.323-6.245 56.554-16.945.269.301.47.64.759.929l54.38 54.38c8.169 8.168 21.413 8.168 29.583 0 8.168-8.169 8.168-21.413 0-29.582zm-141.275-44.458c-37.134 0-67.236-30.102-67.236-67.235 0-37.134 30.103-67.236 67.236-67.236 37.132 0 67.235 30.103 67.235 67.236s-30.103 67.235-67.235 67.235z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                <?= \frontend\modules\moto_clubs\widgets\MotoClubsHome::widget(); ?>
            </article>
        </div>
    </div>
</section>

<section class="main-page__gallery">
    <div class="container">
        <h2>Галерея</h2>
        <div class="gallery">
            <?= \frontend\modules\user_photo\widgets\UserPhotoHome::widget(); ?>
        </div>
    </div>
</section>