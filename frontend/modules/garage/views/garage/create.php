<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\garage\models\Garage */
/* @var $mark common\models\db\CarMark */

$this->title = 'Create Garage';
$this->params['breadcrumbs'][] = ['label' => 'Garages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="garage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mark' => $mark,
    ]) ?>

</div>
