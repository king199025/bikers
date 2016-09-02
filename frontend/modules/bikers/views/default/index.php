
<?php
//\common\classes\Debug::prn($model);
?>
<section class="bikers">
    <div class="container">
        <h2>Звездатые байкеры</h2>
        <form class="bikers__form" action="">
            <input class="garage-form__add-baik_form_input" type="search" placeholder="введите имя">
        </form>
        <div class="bikers-all">
            <div class="bikers-all__items">
                <?php foreach($model as $item):?>
                <div class="bikers-all__items_user">
                    <div class="thumb">
                        <img src="<?=$item->profile->gravatar_id ? 'http://gravatar.com/avatar/'.$item->profile->gravatar_id : '/frontend/web/app/img/biker-avatar.png'?>" alt="">
                    </div>
                    <div class="text">
                        <p><a href="<?=\yii\helpers\Url::to(['/bikers/default/view','id'=>$item->id])?>">
                                <?=$item->profile->name.' '.$item->road_nickname?>
                            </a></p>
                    </div>
                </div>
                <?php endforeach;?>

        </div>
        <a href="" class="show-allbikers"> посмотреть еще</a>

    </div>
</section>