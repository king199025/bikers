<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\clubs\models\Clubs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clubs-view">

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
            'name_rus',
            'name_en',
            'type',
            'filial',
            'address',
            'logo',
            'dt_start',
            'site',
            'group_vk',
            'group_fb',
            'group_ok',
            'email:email',
            'phone',
            'skype',
            'description:ntext',
            'slug',
            'status',
            'user_id',
        ],
    ]) ?>

</div>
