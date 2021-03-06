<!-- @@block  =  footer-->
<footer class="footer">
    <!-- open .container -->
    <div class="container">
        <!-- open .footer__logo -->
        <div class="footer__logo">
            <a href="/">
                <img src="/img/logo-footer.png" alt="" />
            </a>

        </div>
        <!-- close .footer__logo -->
        <!-- open .footer__site-map -->
        <div class="footer__site-map">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="#">Как это работает</a></li>
                <li><a href="#">О сообществе</a></li>
                <li><a href="#">Новости</a></li>
                <li><a href="#">Мотокалендарь</a></li>
                <li><a href="#">Проложить маршрут</a></li>
                <li><a href="#">Поиск мероприятий</a></li>
                <li><a href="#">Добавить мероприятие</a></li>
                <li><a href="#">Личный кабинет</a></li>
                <li><a href="#">Байкеры</a></li>
                <li><a href="#">Мотоклубы</a></li>
                <li><a href="#">Блог сообщества</a></li>
            </ul>
        </div>
        <!-- close .footer__site-map -->
    </div>
    <!-- close .container -->

</footer>
<div class="myModal modal">
    <!-- Modal content -->
    <?= \frontend\widgets\Login::widget(); ?>

</div>
<div class="overlay"></div>
<!-- open .footer__rules -->
<nav class="footer__rules">
    <!-- open .container -->
    <div class="container">
        <ul>
            <li><a href="#">Политика конфиденциальности</a></li>
            <li><a href="#">Правила сообщества</a></li>
            <li><a href="#">Обратная связь</a></li>
            <li><a href="#">Пожертвоввания</a></li>
        </ul>
    </div>
    <!-- close .container -->
</nav>
<!-- close .footer__rules -->
