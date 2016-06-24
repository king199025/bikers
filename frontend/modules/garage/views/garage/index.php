<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\garage\models\GarageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Garages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="garage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Garage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'label' => 'mark_id',
                'format' => 'text',
                'value' => function($model){

                    return \common\models\db\CarMark::findOne(['id_car_mark' => $model->mark_id])->name;
                }
            ],

            [
                'label' => 'model_id',
                'format' => 'text',
                'value' => function($model){

                    return \common\models\db\CarModel::findOne(['id_car_model' => $model->model_id])->name;
                }
            ],

             'year',
             'volume',

            [
                'label' => 'used',
                'format' => 'text',
                'value' => function($model){
                    return ($model->used == 0) ? 'Бывший мотоцикл' : 'Действующий мотоцикл';
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
