<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\moto_clubs\models\MotoClubs */

$this->title = 'Редактирование: ' . $model->name_rus;
$this->params['breadcrumbs'][] = ['label' => 'Мотоклубы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_rus];

?>
<section class="garage-form">
    <div class="container">
        <h2 class="garage-form-title">Клуб</h2>
        <div class="garage-form__add-baik">
            <h2 class="garage-form-title"><?= Html::encode($this->title) ?></h2>

            <?= $this->render('_form', [
                'model' => $model,
                'type' => $type,
                'cityList' => $cityList,
                'img' => $img,
            ]) ?>

        </div>
    </div>
</section>
