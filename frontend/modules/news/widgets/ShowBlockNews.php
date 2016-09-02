<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 24.06.2016
 * Time: 8:42
 */

namespace frontend\modules\news\widgets;


use common\models\db\Events;
use common\models\db\News;
use yii\base\Widget;

class ShowBlockNews extends Widget
{
    public function run(){
        $news = News::find()->orderBy('dt_add')->limit(4)->all();
        $events = Events::find()->orderBy(['dt_start' => SORT_DESC])->limit(5)->all();
        return $this->render('news', ['news' => $news,'events'=>$events]);
    }
}