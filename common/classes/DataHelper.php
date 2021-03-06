<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 13.09.2016
 * Time: 13:02
 */

namespace common\classes;


class DataHelper
{
    public static function rdate($param, $time=0) {
        if(intval($time)==0)$time=time();
        $MonthNames=array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
        if(strpos($param,'M')===false) return date($param, $time);
        else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
    }
}