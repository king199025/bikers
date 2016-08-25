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

class UserMoto extends Widget
{
    public function run(){
        $userMoto = Garage::find()
                ->leftJoin('car_mark','`garage`.`mark_id` = `car_mark`.`id_car_mark`')
                ->leftJoin('car_model','`garage`.`model_id` = `car_model`.`id_car_model`')
                ->where(['user_id' => \Yii::$app->user->id])
                ->with('car_mark','car_model')
                ->all();

        return $this->render('moto_list', ['moto' => $userMoto]);
    }

}