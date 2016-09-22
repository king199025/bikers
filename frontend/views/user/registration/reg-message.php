<?php

$this->title = "Регистрация";
use yii\helpers\Html;
?>
<section class="activation-ready-section">
    <div class="container">
        <div class="activation-compleate">
            <p>Сейчас Вы должны активировать Ваш аккаунт!</p>
            <p>Перейдите по ссылке, которую мы Вам только что выслали. Если не найдете письма в почте, проверьте Спам.</p>
            <a href="http://www.<?= $link; ?>" target="_blank">Проверить e-mail</a>

            <p class="back-to-main">
                Назад на <a href="/">главную страницу</a></p>
            <p>
                Не получили письмо?
            </p>
            <a href="<?= \yii\helpers\Url::toRoute('/resend'); ?>">Отправить еще раз.</a>
        </div>
    </div>
</section>