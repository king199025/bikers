<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\garage\models\GarageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мой гараж';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/user/settings/user_profile']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="garage-form">
    <div class="container">
        <h2 class="garage-form-title">Мой гараж</h2>
        <div class="garage-form__add-baik">
            <h2 class="garage-form-title">Добавление нового байка</h2>
            <?= $this->render('_form',['model' => $model, 'mark' => $mark]); ?>
        </div>
        <div class="garage-form__in-garage">
            <h2 class="garage-form-title">Уже в гараже</h2>

            <?php foreach($userMoto as $item):?>
                <div class="garage-form__in-garage_items">
                    <div class="moto-photo">
                        <img src="/<?= $item['img_moto'][0]->img; ?>" alt="moto">
                    </div>
                    <div class="bike-info">

                        <p class="make">Марка <span><?= $item['car_mark']->name;?></span></p>
                        <p class="model">Модель <span><?= $item['car_model']->name;?></span></p>
                        <p class="power-engine">Мощность двигателя <span><?= $item->volume; ?></span></p>
                        <p class="active-bike">
                            <span>
                                <?= ($item->used == 1) ? 'Байк действующий' : 'Бывший мотоцикл' ?>
                            </span>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pa-little pa_buttons">
            <a href="#" class="pa_button button button_gray">Настройки оповещений</a>
            <a href="#" class="pa_button button button_gray">Сообщения</a>
            <a href="#" class="pa_button button button_gray">Мои закладки</a>
        </div>
    </div>
</section>

