<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\moto_clubs\models\MotoClubs */

$this->title = 'Create Moto Clubs';
$this->params['breadcrumbs'][] = ['label' => 'Moto Clubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moto-clubs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
