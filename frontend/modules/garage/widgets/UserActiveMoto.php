<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 05.08.2016
 * Time: 14:44
 */

namespace frontend\modules\garage\widgets;


use common\models\db\Garage;
use yii\base\Widget;

class UserActiveMoto extends Widget
{
    public function run(){
        $userMOtoActive = Garage::find()
                ->leftJoin('car_mark','`garage`.`mark_id` = `car_mark`.`id_car_mark`')
                ->leftJoin('car_model','`garage`.`model_id` = `car_model`.`id_car_model`')
                ->where(['user_id' => \Yii::$app->user->id, 'used' => 1])
                ->with('car_mark','car_model')
                ->all();

        return $this->render('active-moto', ['moto' => $userMOtoActive]);
    }

}