<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * @var $this  yii\web\View
 * @var $form  yii\widgets\ActiveForm
 * @var $model dektrium\user\models\SettingsForm
 */

$this->title = Yii::t('user', 'Account settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<!--?php// \common\classes\Debug::prn($model);?-->

<section class="settings-account">
    <div class="container">
        <div class="settings-mnu">
            <h3>Настройки Аккаунта</h3>
            <a class="settings-mnu__items" href="<?=\yii\helpers\Url::to('profile')?>">ПРОФИЛЬ</a>
            <div class="settings-mnu__items button button_orange" >АККАУНТ</div>
        </div>
        <div class="settings-account-form">
            <h4>Настройки аккаунта</h4>
            <?php $form = ActiveForm::begin([
            'id'          => 'account-form',
           # 'options'     => [''],
        'enableAjaxValidation'   => true,
        'enableClientValidation' => false,
        ]); ?>
        <?= $form->field($model, 'road_nickname')
            ->textInput(['class'=>'settings-account-form_item','placeholder'=>'Дорожное прозвище'])
            ->label(false)?>
        <?= $form->field($model, 'email')
            ->textInput(['class'=>'settings-account-form_item','placeholder'=>'Email'])
            ->label(false)?>

        <?= $form->field($model, 'username')
            ->textInput(['class'=>'settings-account-form_item','placeholder'=>'Имя пользовтаеля'])
            ->label(false)?>

        <?= $form->field($model, 'new_password')
            ->passwordInput(['class'=>'settings-account-form_item','placeholder'=>'Новый пароль'])
            ->label(false)?>

        <hr />

        <?= $form->field($model, 'current_password')
            ->passwordInput(['class'=>'settings-account-form_item','placeholder'=>'Текущий пароль'])
            ->label(false)?>

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <?= Html::submitButton(Yii::t('user', 'Сохранить'), ['class' => 'button button_orange subm']) ?><br>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

            </form-->
        </div>
    </div>

</section>
