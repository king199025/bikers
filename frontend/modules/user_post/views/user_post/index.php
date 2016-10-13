<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\user_post\models\UserPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'title',
            'content:ntext',
            'slug',
            // 'dt_add',
            // 'dt_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
