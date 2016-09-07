<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02.09.16
 * Time: 11:55
 */
namespace frontend\modules\events\widgets;


use common\models\db\City;
use common\models\db\Events;
use frontend\models\user\User;
use yii\base\Widget;

class ShowFindEvents extends Widget
{
    public function run()
    {


        $participants = User::find()
            ->leftJoin('`events_user`','`events_user`.`user_id` = `user`.`id`')
            //->where(['`events_user`.`events_id`' => $id])
            ->count();

        $events = Events::find()->orderBy(['dt_start' => SORT_DESC])->with('city')->limit(5)->asArray()->all();
        return $this->render('events_block', ['events'=>$events]);
    }
}