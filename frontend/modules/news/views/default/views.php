<?php
/**
 * @var $news common\models\db\News
 */

$this->title = $news->name;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['/news']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- open .news__all -->
<section class="news__open">
	<!-- open .container -->
	<div class="container">
		<!-- open .news__item -->
		<div class="news__item">
			<img class="news__item_thumb" src="<?= $news->img; ?>" alt="" />
			<!-- open .news__item_desc -->
			<div class="news__item_desc">
				<small class="news__item_date"><?= date('d.m.Y', $news->dt_add)?></small>
				<h4><?= $news->name; ?></h4>
				<?= $news->text; ?>
			</div>
			<!-- close .news__item_desc -->

		</div>
		<!-- close .news__item -->

		<?php echo \frontend\modules\news\widgets\ShowOtherNews::widget(['id'=>$news->id]); ?>
	</div>
	<!-- close .container -->
</section>
<!-- close .news__all -->


