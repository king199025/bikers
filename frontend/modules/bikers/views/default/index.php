
<?php
$this->title = "Все байкеры";
?>
<section class="bikers">
    <div class="container">
        <h2>Звездатые байкеры</h2>
        <form class="bikers__form" action="">
            <input class="garage-form__add-baik_form_input" type="search" placeholder="введите имя">
        </form>
        <div class="bikers-all">
            <?php foreach($model as $item):?>
            <div class="bikers-all__items_user">
                <div class="thumb">
                    <a href="<?= \yii\helpers\Url::to(['/user/profile/show', 'id'=> $item->id]); ?>"><img src="<?= \common\classes\UserFunction::getUser_avatar_url($item->id); ?>" alt=""></a>
                </div>
                <div class="text">
                    <p><a href="<?= \yii\helpers\Url::to(['/user/profile/show', 'id'=> $item->id]); ?>"><?=$item->profile->name.' '.$item->road_nickname?></a></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!--<a href="" class="show-allbikers"> посмотреть еще</a>-->
    <a href="#" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" id="more-bikers" data-count="<?= $page; ?>" class="show-allbikers">посмотреть еще</a>

    <!--<div class="bikers-all-dop">

    </div>-->

</section>
