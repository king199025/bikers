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
        $userMOtoActive = Garage::find()->where(['user_id' => \Yii::$app->user->id, 'used' => 1])->all();

        return $this->render('active-moto', ['moto' => $userMOtoActive]);
    }

}