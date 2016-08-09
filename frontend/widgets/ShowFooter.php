<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 23.06.2016
 * Time: 9:00
 */

namespace frontend\widgets;


use yii\base\Widget;

class ShowFooter extends Widget
{
    public function run(){
        return $this->render('footer');
    }
}