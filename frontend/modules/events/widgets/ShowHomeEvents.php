<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 12.09.2016
 * Time: 15:55
 */

namespace frontend\modules\events\widgets;



use common\models\db\Events;
use yii\base\Widget;

class ShowHomeEvents extends Widget
{
    public function run(){

        $userEvents = Events::find()->where(['user_id' => \Yii::$app->user->id])->limit(10)->all();


        $events = Events::find()
            ->where(['!=', 'status', 0])
            ->andWhere(['!=', 'status', 2])
            ->orderBy('dt_start DESC')

            ->limit(10)
            ->all();

        return $this->render('home-events',
            [
                'events' => $events,
                'userEvents' => $userEvents,
            ]);
    }

}