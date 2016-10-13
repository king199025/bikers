<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02.09.16
 * Time: 11:55
 */
namespace frontend\modules\events\widgets;


use common\models\db\Events;
use yii\base\Widget;

class ShowBlockEvents extends Widget
{
    public function run(){
        $events = Events::find()
            ->andWhere(['!=', 'status', 0])
            ->andWhere(['!=', 'status', 2])
            ->orderBy(['dt_start' => SORT_DESC])->limit(12)->all();
        return $this->render('events', ['events'=>$events]);
    }
}