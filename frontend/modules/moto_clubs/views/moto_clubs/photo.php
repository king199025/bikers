<?php
$this->title = $model->name_rus;
$this->params['breadcrumbs'][] = ['label' => 'Мотоклубы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view','id'=>$model->id]];
$this->params['breadcrumbs'][] = 'Все фотографии';
?>
<section class="gallery-page">
    <div class="container">
        <div class="gallery">
            <?php foreach($img as $item):?>
                <a class="fancybox-thumb gallery-item" rel="fancybox-thumb" href="/<?=$item->img?>" title="<?= $model->name_en; ?>">
                    <img src="/<?=$item->img?>" alt="">
                </a>
            <?php endforeach;?>
        </div>
    </div>
</section>
