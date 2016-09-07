<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Events */

$this->title = 'Create Events';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'typesList' => $typesList,
        'cityList' => $cityList,
        'clubsList' => $clubsList,
        'img' => $img
    ]) ?>

</div>
