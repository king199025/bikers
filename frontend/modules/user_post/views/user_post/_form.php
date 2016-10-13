<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\user_post\models\UserPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false);  ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'content')->textarea(['rows' => 6]) */?>
    <?php echo $form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'basic',
            'inline' => false,

            'path' => 'identificator_1',
        ]),
    ]);?>
    <?/*= $form->field($model, 'slug')->textInput(['maxlength' => true]) */?><!--

    <?/*= $form->field($model, 'dt_add')->textInput() */?>

    --><?/*= $form->field($model, 'dt_update')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
