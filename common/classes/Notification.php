<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.11.2016
 * Time: 15:58
 */

namespace common\classes;


use common\models\db\UserWarning;
use Yii;

class Notification
{

    public static function ab(){
        return new Notification();
    }



    public static function sendMailUser($fact, $fact_id){
        $obj = self::ab();
        $user = $obj->getUser($fact);
        switch($fact){
            case 'new_news':{
                $subject = 'Новая новость';
                $text = 'На сайт добавлена новая новость';
                break;
            }
            case 'new_events':{
                $subject = 'Новое событие';
                $text = 'На сайт добавлено новое событие';
                break;
            }
            case 'new_travel':{
                $subject = 'Новое путешествие';
                $text = 'На сайт добавлено новое путешествие';
                break;
            }
        }
        foreach ($user as $item){
            Yii::$app->mailer->compose()
                ->setFrom('kavalar@art-craft.tk')
                ->setTo($item['user']->email)
                ->setSubject($subject)
                ->setTextBody($text)
                ->setHtmlBody($text)
                ->send();
        }
       /* */
        //Debug::prn($user);
    }


    function getUser($fact){
        $user = UserWarning::find()
            ->leftJoin('user', '`user`.`id` = `user_warning`.`user_id`')
            ->where([$fact => 1])
            ->with('user')
            ->all();

        return $user;
    }
}