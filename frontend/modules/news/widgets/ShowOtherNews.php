<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\modules\news\widgets;




use yii\base\Widget;
use common\models\db\News;
/**
 * Description of ShowOtherNews
 *
 * @author alex
 */
class ShowOtherNews extends Widget {
    
    public $id;


    public function run()
    {
        $news = News::find()->where(['!=','id', $this->id])->orderBy('dt_add')->limit(10)->all();
        return $this->render('other_news', ['news' => $news]);
    }
}
