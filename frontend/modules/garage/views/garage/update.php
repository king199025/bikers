<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\Garage */

$this->title = 'Update Garage: ';
$this->params['breadcrumbs'][] = ['label' => 'Garages', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="garage-update">

    <h1><?/*= Html::encode($this->title) */?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mark' => $mark,
        'carmodel' => $carmodel,
        'img' => $img,
    ]) ?>

</div>
