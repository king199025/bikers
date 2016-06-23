<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 23.06.2016
 * Time: 9:02
 */

namespace frontend\widgets;


use yii\base\Widget;

class ShowHeader extends Widget
{
    public function run(){
        return $this->render('header');
    }
}