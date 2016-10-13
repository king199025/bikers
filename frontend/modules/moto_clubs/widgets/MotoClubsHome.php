<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 06.10.2016
 * Time: 13:15
 */

namespace frontend\modules\moto_clubs\widgets;


use frontend\modules\moto_clubs\models\MotoClubs;
use yii\base\Widget;

class MotoClubsHome extends Widget
{
    public function run(){
        $clubs = MotoClubs::find()->where(['status' => 1])->limit(12)->orderBy('RAND()')->all();
        return $this->render('clubs-home', ['clubs' => $clubs]);
    }
}