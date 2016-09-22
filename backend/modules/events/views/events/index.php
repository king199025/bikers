<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\events\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'city',
            //'city_near',
            //'lon',
            // 'lat',
            // 'dt_start',
            // 'dt_end',
            // 'site_url:url',
            // 'vk_url:url',
            // 'ok_url:url',
            // 'fb_url:url',
            // 'other_link1',
            // 'other_link2',
            // 'other_link3',
            // 'afisha',
            // 'type',
            // 'organizer',
            // 'tags',
            // 'program',
            // 'user_id',
            [
                'attribute'=>'status',

                'format' => 'raw',
                'content'=>function($model){
                    return Html::dropDownList(
                        'status',$model->status,
                        ['0' => 'На модерации','1' =>'Опубликовно', '2' => 'В черновик', '3' => 'Завершен'],
                        ['class' => 'select_status','data-id' => $model->id]
                    );

                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
