<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\user_post\models\UserPost */

$this->title = 'Create User Post';
$this->params['breadcrumbs'][] = ['label' => 'User Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
