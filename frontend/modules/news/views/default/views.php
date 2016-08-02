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

		<!-- open .news__other -->
		<div class="news__other">
			<h3>Другие новости</h3>
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
						  <path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
						  <path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
						  <path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
							<path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
							<path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
							<path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
							<path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
							<path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
							<path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
			<!-- open .news__item -->
			<div class="news__item">
				<img class="news__item_thumb" src="img/placeholder.jpg" alt="" />
				<!-- open .news__item_desc -->
				<div class="news__item_desc">
					<small class="news__item_date">10.05.2015</small>
					<h4>Расширился список документов для изменения фасада здания</h4>
					<p>Контент в разработке. Расширился список документов для изменения фасада здания. Расширился список документов для изменения фасада здания. Расширился список документов. </p>
					<a href="#" class="news__item_more">Подробнее
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 238.003 238.003">
						  <path d="M181.776 107.72L78.706 4.647c-6.2-6.198-16.274-6.198-22.47 0s-6.2 16.273 0 22.47L148.116 119l-91.882 91.884c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.07-103.04a15.74 15.74 0 0 0 4.64-11.282c0-4.13-1.525-8.2-4.64-11.313z"/>
						</svg>
					</a>
				</div>
				<!-- close .news__item_desc -->
			</div>
			<!-- close .news__item -->
		</div>
		<!-- close .news__other -->
	</div>
	<!-- close .container -->
</section>
<!-- close .news__all -->


