<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 24.06.2016
 * Time: 8:42
 */

namespace frontend\modules\news\widgets;


use common\classes\Debug;
use common\models\db\Events;
use common\models\db\EventsUser;
use common\models\db\News;
use yii\base\Widget;

class ShowBlockNews extends Widget
{
    public function run(){
        $news = News::find()->orderBy('dt_add')->limit(6)->all();


        $events = EventsUser::find()
            ->select('*, COUNT( events_id ) AS count')
            ->leftJoin('`events`', '`events`.`id` = `events_user`.`events_id`')
            ->where(['>=','dt_end', time()])
            ->groupBy('`events_user`.`events_id`')
            ->orderBy('count DESC')
            ->limit(6)
            ->with('events')
            ->all();

        /*$events = EventsUser::find()
            ->select('COUNT( * ) AS count')
            ->leftJoin('`events`', '`events`.`id` = `events_user`.`events_id`')
            ->where(['>=','dt_end', time()])
            ->groupBy('`events_user`.`events_id`')
            ->orderBy('count DESC')
            ->limit(6)
            ->with('events')
            ->all();*/

       // Debug::prn($events);
        return $this->render('news', ['news' => $news,'events'=>$events]);
    }
}