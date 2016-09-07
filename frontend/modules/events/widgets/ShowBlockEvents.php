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
        $events = Events::find()->orderBy(['dt_start' => SORT_DESC])->limit(14)->all();
        return $this->render('events', ['events'=>$events]);
    }
}