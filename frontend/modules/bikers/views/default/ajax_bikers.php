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