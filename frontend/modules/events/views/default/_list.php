	<!-- open .events-conrent__item_thumb -->
	<a href="#" class="events-conrent__item_thumb">
                                        <img src="/frontend/web/img/placeholder.png" alt="" />
		<span class="events-conrent__item_distance"><strong>2800</strong>км</span>
	</a>
	<!-- close .events-conrent__item_thumb -->
	<a href="<?=\yii\helpers\Url::to(['view','id'=>$model['id']])?>" class="events-conrent__item_title"><?=$model['name']?></a>
	<span class="events-conrent__item_date"><?=date('j F',$model['dt_start'])?></span>
    <a href="<?=\yii\helpers\Url::to(['view','id'=>$model['id']])?>" class="button button_orange events-conrent__item_price"><?=$model['city'][0]['Name']?></a>
