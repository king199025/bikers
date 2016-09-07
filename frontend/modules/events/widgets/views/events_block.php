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
                    <a href="#" class="motocalendar__list_nav_btn" data-tab="motocalendar__list_mine">Мои мероприятия</a>
                </nav>
                <!-- close .motocalendar__list_nav -->
                <!-- open .motocalendar__list_box -->
                <div class="motocalendar__list_tab motocalendar__list_box">
                    <!-- open .motocalendar__list_item -->
                    <?php foreach ($events as $item): ?>
                    <div data-event="<?=$item['id']?>" class="motocalendar__list_item">
                        <span class="motocalendar__list_title"><?=$item['name']?></span>
                        <small>Начало: <span class="motocalendar__list_start"><?=date('d.m.Y',$item['dt_start'])?></span></small>
                        <small>Окончание: <span class="motocalendar__list_end"><?=date('d.m.Y',$item['dt_end'])?></span></small>
                        <small>Едут: <span class="motocalendar__list_number">62</span> человека</small>
                    </div>
                    <?php endforeach; ?>
                    <!-- close .motocalendar__list_item -->
                </div>
                <!-- close .motocalendar__list_box -->

                <!-- open .motocalendar__list_mine -->
                <div class="motocalendar__list_tab motocalendar__list_mine"></div>
                <!-- close .motocalendar__list_mine -->
            </aside>
            <!-- close .motocalendar__list -->

            <!-- open .motocalendar__event -->
            <article class="motocalendar__event">
                <!-- open .motocalendar__event_nav -->
                <div class="motocalendar__event_nav">
                    <a href="#">Добавить в закладки</a>
                    <a href="#">Я поеду!</a>
                    <a href="#">Сообщение автору</a>
                </div>
                <!-- close .motocalendar__event_nav -->
                <!-- open .motocalendar__event_box -->
                <div class="motocalendar__event_box">
                <?= $this->render('single_event',[
                    'item' => $events[0]
                ]) ?>
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