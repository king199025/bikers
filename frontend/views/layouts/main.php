<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= \frontend\widgets\ShowHeader::widget(); ?>

<!-- @@block  =  content-->
<!-- open .breadcrubs -->
<article class="breadcrumbs">
    <!-- open .container -->
    <div class="container">
        <!-- open .bread -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => ['class' => 'breadcrumbs__list']
        ]) ?>
        <!-- close .bread -->
    </div>
    <!-- close .container -->
</article>
<!-- close .breadcrubs -->

    <?= Alert::widget() ?>
    <?= $content ?>



<?= \frontend\widgets\ShowFooter::widget(); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

