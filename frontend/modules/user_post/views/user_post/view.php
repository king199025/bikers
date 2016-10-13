<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\user_post\models\UserPost */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'User Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-post-view">

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
            'user_id',
            'title',
            'content:ntext',
            'slug',
            'dt_add',
            'dt_update',
        ],
    ]) ?>

</div>
