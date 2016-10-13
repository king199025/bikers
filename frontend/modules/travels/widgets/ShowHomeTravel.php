<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 29.09.2016
 * Time: 12:00
 */

namespace frontend\modules\travels\widgets;


use common\models\db\Travel;
use yii\bootstrap\Widget;

class ShowHomeTravel extends Widget
{
    public function run(){
        $travel = Travel::find()->orderBy('dt_start')->all();
        return $this->render('travel-home', ['travel' => $travel]);
    }
}