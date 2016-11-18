<!-- open .header -->
<header class="header">
    <!-- open .container -->
    <div class="container">
        <!-- open .header__logo -->
        <div class="header__logo">
            <a href="/">
                <img src="/frontend/web/img/logo.png" alt="" />
            </a>
        </div>
        <!-- close .header__logo -->
        <!-- open .header__controls -->
        <div class="header__controls">
            <?php if(Yii::$app->user->isGuest):?>
                <a href="#" class="myBtn button button_gray header__controls_signin">Вход</a>
                <a href="<?=\yii\helpers\Url::to('/register')?>" class="button button_dark header__controls_signup">Зарегистрироваться</a>
            <?php else: ?>
                <?= \yii\helpers\Html::a( '<span class="pa_bg_exit"></span>Выйти', \yii\helpers\Url::to(['/user/security/logout']), ['data-method' => 'POST','class'=>'personal_area pa_exit']) ?>
                <a href="<?=\yii\helpers\Url::to(['/user/settings/user_profile'])?>" class="personal_area pa_personal-area"><span class="pa_bg_personal-area"></span>Личный кабинет</a>
                <a href="<?=\yii\helpers\Url::to('/events/default/create')?>" class="button button_orange header__controls_add">+ Добавить мероприятие</a>
            <?php endif;?>
        </div>
        <!-- close .header__controls -->
    </div>
    <!-- close .container -->

</header>
<!-- close .header -->



<nav class="navigation">
    <!-- open .container -->
    <div class="container">
        <!-- open .navigation__btn -->
        <a href="#" class="navigation__btn"><span></span></a>
        <!-- close .navigation__btn -->
        <!-- open .navigation__menu -->
        <a href="#" class="main-button">Главная</a>
        <ul class="navigation__menu_1">
            <li>

                <a href="" title="Меню">Меню</a>
                
                <ul>
                    <li><a href="<?=\yii\helpers\Url::to('/news')?>">Новости</a></li>
                    <li><a href="<?=\yii\helpers\Url::to('/events/default')?>">Мотокалендарь</a></li>
                    <li><a href="<?=\yii\helpers\Url::to('/bikers/default')?>">Байкеры</a></li>
                    <li><a href="<?=\yii\helpers\Url::to('/moto_clubs/moto_clubs')?>">Мотоклубы</a></li>
                    <li><a href="<?=\yii\helpers\Url::to('/travels/default')?>">Путешествия</a></li>
                </ul>
            </li>

            <!-- <li><a href="#">Главная</a></li>
            <li><a href="#">Мотокалендарь</a></li>
            <li><a href="#">Байкеры</a></li>
            <li><a href="#">Мотоклубы</a></li>
            <li><a href="#">Путешествия</a></li> -->
            <!-- <li><a href="#">О нас</a></li>
            <li><a href="#">Обратная связь</a></li> -->
        </ul>
        <!-- close .navigation__menu -->
        <!-- open .navigation__search -->
        <form class="navigation__search" method="post" action="<?= \yii\helpers\Url::to(['/site/search_all'])?>">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken(); ?>">
            <input type="text" name="search-all" class="navigation__search_box" placeholder="Поиск" />
            <button class="navigation__search_icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250.313 250.313"><path d="M244.186 214.604l-54.379-54.378c-.289-.289-.628-.491-.93-.76 10.7-16.231 16.945-35.66 16.945-56.554C205.822 46.075 159.747 0 102.911 0S0 46.075 0 102.911c0 56.835 46.074 102.911 102.91 102.911 20.895 0 40.323-6.245 56.554-16.945.269.301.47.64.759.929l54.38 54.38c8.169 8.168 21.413 8.168 29.583 0 8.168-8.169 8.168-21.413 0-29.582zm-141.275-44.458c-37.134 0-67.236-30.102-67.236-67.235 0-37.134 30.103-67.236 67.236-67.236 37.132 0 67.235 30.103 67.235 67.236s-30.103 67.235-67.235 67.235z" fill-rule="evenodd" clip-rule="evenodd"/></svg>
            </button>
        </form>
        <!-- close .navigation__search -->
        <!-- open .navigation__menu -->
        <ul class="navigation__menu_2">
            <!-- <li><a href="#">Главная</a></li>
            <li><a href="#">Мотокалендарь</a></li>
            <li><a href="#">Байкеры</a></li>
            <li><a href="#">Мотоклубы</a></li>
            <li><a href="#">Путешествия</a></li> -->
            <li><a href="#">О нас</a></li>
            <li><a href="#">Обратная связь</a></li>
        </ul>
        <!-- close .navigation__menu -->
        <ul class="navigation__menu_mobile">
            <li><a href="">Меню</a></li>
            <li><a href="/">Главная</a></li>

            <li><a href="<?=\yii\helpers\Url::to('/events/default')?>">Мотокалендарь</a></li>
            <li><a href="<?=\yii\helpers\Url::to('/bikers/default')?>">Байкеры</a></li>
            <li><a href="<?=\yii\helpers\Url::to('/clubs/default')?>">Мотоклубы</a></li>
            <li><a href="<?=\yii\helpers\Url::to('/travels/default')?>">Путешествия</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Обратная связь</a></li>
        </ul>
    </div>
    <!-- close .container -->

</nav>
<!-- close .navigation -->