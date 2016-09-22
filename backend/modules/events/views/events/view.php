<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\events\models\Events */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'city',
            'city_near',
            'lon',
            'lat',
            'dt_start',
            'dt_end',
            'site_url:url',
            'vk_url:url',
            'ok_url:url',
            'fb_url:url',
            'other_link1',
            'other_link2',
            'other_link3',
            'afisha',
            'type',
            'organizer',
            'tags',
            'program',
            'user_id',
            'status',
        ],
    ]) ?>

</div>
