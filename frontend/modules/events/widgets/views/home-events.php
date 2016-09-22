<!-- open .motocalendar -->
<section class="motocalendar">
    <!-- open .cantainer -->
    <div class="container">
        <h3>
            <a href="#" class="motocalendar_title motocalendar_title-active" data-tab="motocalendar__content">Мотокалендарь</a>
            <a href="#" class="motocalendar_title" data-tab="motocalendar__search">Найти мероприятие</a>
        </h3>
        <!-- open .motocalendar__content -->
        <div class="motocalendar__tab motocalendar__content">
            <!-- open .motocalendar__list -->
            <aside class="motocalendar__list">
                <!-- open .motocalendar__list_nav -->
                <nav class="motocalendar__list_nav">
                    <a href="#" class="motocalendar__list_nav_btn motocalendar__list_nav-active" data-tab="motocalendar__list_box">Все мероприятия</a>
                    <?php if(!Yii::$app->user->isGuest): ?>
                        <a href="#" class="motocalendar__list_nav_btn" data-tab="motocalendar__list_mine">Мои мероприятия</a>
                    <?php endif; ?>
                </nav>
                <!-- close .motocalendar__list_nav -->
                <!-- open .motocalendar__list_box -->
                <div class="motocalendar__list_tab motocalendar__list_box">

                    <?php foreach($events as $item): ?>
                        <a href="#nowhere" data-id="<?= $item->id; ?>" class="motocalendar__list_item">
                            <span class="motocalendar__list_title"><?= $item->name?></span>
                            <small>Начало: <span class="motocalendar__list_start"><?= date('d.m.Y', $item->dt_start);?></span></small>
                            <small>Окончание: <span class="motocalendar__list_end"><?= date('d.m.Y', $item->dt_end);?></span></small>
                            <small>Едут: <span class="motocalendar__list_number"><?= \common\classes\EventsFunction::get_events_user_go($item->id); ?></span> человека</small>
                        </a>
                    <?php endforeach; ?>
                    <!-- close .motocalendar__list_item -->
                </div>
                <!-- close .motocalendar__list_box -->

                <!-- open .motocalendar__list_mine -->
                <div class="motocalendar__list_tab motocalendar__list_mine">
                    <?php if(!Yii::$app->user->isGuest): ?>
                        <?php if(!empty($userEvents)):
                             foreach($userEvents as $item): ?>
                                <a href="#nowhere" data-id="<?= $item->id; ?>" class="motocalendar__list_item">
                                    <span class="motocalendar__list_title"><?= $item->name?></span>
                                    <small>Начало: <span class="motocalendar__list_start"><?= date('d.m.Y', $item->dt_start);?></span></small>
                                    <small>Окончание: <span class="motocalendar__list_end"><?= date('d.m.Y', $item->dt_end);?></span></small>
                                    <small>Едут: <span class="motocalendar__list_number"><?= \common\classes\EventsFunction::get_events_user_go($item->id); ?></span> человека</small>
                                </a>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <div class="orange">У вас нет мероприятий</div>
                            <a href="<?=\yii\helpers\Url::to('/events/default/create')?>" class="button button_orange header__controls_add">+ Добавить мероприятие</a>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                <!-- close .motocalendar__list_mine -->
            </aside>
            <!-- close .motocalendar__list -->

            <!-- open .motocalendar__event -->
            <article class="motocalendar__event">
                <!-- open .motocalendar__event_nav -->
                <div class="motocalendar__event_nav">
                    <a id="add_event_to_bookmarks" data-event="<?= $events[0]->id?>" href="#">Добавит закладки</a>
                    <a id="add_participant" data-event="<?= $events[0]->id?>" href="#">Я поеду!</a>
                    <a href="#">Сообщение автору</a>
                </div>
                <!-- close .motocalendar__event_nav -->
                <!-- open .motocalendar__event_box -->
                <div class="motocalendar__event_box">
                    <!-- open .motocalendar__event_info -->
                    <div class="motocalendar__event_info">
                        <!-- open .motocalendar__event_info_line -->
                        <div class="motocalendar__event_info_line">
                            <span class="motocalendar__event_info_line-title">Название мероприятия:</span>
                            <?= $events[0]->name; ?>
                        </div>
                        <!-- close .motocalendar__event_info_line -->
                        <!-- open .motocalendar__event_info_line -->
                        <div class="motocalendar__event_info_line">
                            <span class="motocalendar__event_info_line-title">Место проведения:</span>
                            <?= \common\classes\EventsFunction::get_city_event($events[0]->city)?>
                        </div>
                        <!-- close .motocalendar__event_info_line -->
                        <!-- open .motocalendar__event_info_line -->
                        <div class="motocalendar__event_info_line">
                            <span class="motocalendar__event_info_line-title">Даты проведения: </span>
                            с <?= date('d.m.Y', $events[0]->dt_start); ?> до <?= date('d.m.Y', $events[0]->dt_end); ?>
                        </div>
                        <!-- close .motocalendar__event_info_line -->
                        <!-- open .motocalendar__event_info_line -->
                        <div class="motocalendar__event_info_line">
                            <span class="motocalendar__event_info_line-title">Едут:   </span>
                            <?= \common\classes\EventsFunction::get_events_user_go($events[0]->id); ?> человека
                        </div>
                        <!-- close .motocalendar__event_info_line -->
                        <!-- open .motocalendar__event_info_line -->
                        <div class="motocalendar__event_info_line">
                            <span class="motocalendar__event_info_line-title">Опубликовал:  </span>
                            <a href="<?= \yii\helpers\Url::to(['/user/profile/show', 'id' => $events[0]->user_id])?>"><?= \common\classes\UserFunction::get_user_road_nickname($events[0]->user_id)?></a>
                        </div>
                        <!-- close .motocalendar__event_info_line -->
                        <!-- open .motocalendar__event_info_line -->
                        <div class="motocalendar__event_info_line">
                            <span class="motocalendar__event_info_line-title">Ссылка:   </span>
                            <a href="<?= $events[0]->site_url; ?>"><?= $events[0]->site_url?></a>
                        </div>
                        <!-- close .motocalendar__event_info_line -->
                        <!-- open .motocalendar__event_info_subscribe -->
                        <div class="motocalendar__event_info_subscribe">
                            <span class="motocalendar__event_info_subscribe-title">Поделиться:</span>
                        </div>
                        <!-- close .motocalendar__event_info_subscribe -->
                    </div>
                    <!-- close .motocalendar__event_info -->
                    <!-- open .motocalendar__event_thumb -->
                    <div class="motocalendar__event_thumb">
                        <img src="<?= $events[0]->afisha; ?>" alt="" />
                    </div>
                    <!-- close .motocalendar__event_thumb -->
                    <!-- open .motocalendar__event_desc -->
                    <div class="motocalendar__event_desc">
                        <h4>Описание мероприятия
                            <a href="#" class="motocalendar__event_comments">
	    							<span class="motocalendar__event_comments_icon">
		    							<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 612 612"><path d="M401.625 325.125h-191.25c-10.557 0-19.125 8.568-19.125 19.125s8.568 19.125 19.125 19.125h191.25c10.557 0 19.125-8.568 19.125-19.125s-8.568-19.125-19.125-19.125zm38.25-114.75h-267.75c-10.557 0-19.125 8.568-19.125 19.125s8.568 19.125 19.125 19.125h267.75c10.557 0 19.125-8.568 19.125-19.125s-8.568-19.125-19.125-19.125zM306 0C137.012 0 0 119.875 0 267.75c0 84.514 44.848 159.751 114.75 208.826V612l134.047-81.339c18.552 3.061 37.638 4.839 57.203 4.839 169.008 0 306-119.875 306-267.75S475.008 0 306 0zm0 497.25c-22.338 0-43.911-2.601-64.643-7.019l-90.041 54.123 1.205-88.701C83.5 414.133 38.25 345.513 38.25 267.75c0-126.741 119.875-229.5 267.75-229.5s267.75 102.759 267.75 229.5S453.875 497.25 306 497.25z"/></svg>
	    							</span>

                                5
                            </a>
                        </h4>
                        <p><?= $events[0]->program; ?></p>
                        <a href="<?= \yii\helpers\Url::to(['/events/default/view', 'id' => $events[0]->id])?>" class="button button_orange">УЗНАТЬ ПОДРОБНЕЕ</a>
                    </div>
                    <!-- close .motocalendar__event_desc -->
                </div>
                <!-- close .motocalendar__event_box -->
            </article>
            <!-- close .motocalendar__event -->

        </div>
        <!-- close .motocalendar__content -->
        <!-- open .motocalendar__search -->
        <div class="motocalendar__tab motocalendar__search"></div>
        <!-- close .motocalendar__search -->
    </div>
    <!-- close .cantainer -->
</section>
<!-- close .motocalendar -->