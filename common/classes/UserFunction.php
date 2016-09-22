<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 05.04.2016
 * Time: 13:58
 */

namespace common\classes;


use dektrium\user\models\Profile;
use dektrium\user\models\User;
use Yii;

class UserFunction
{
    //получить роль текущего пользователя
    public static function getRole_user(){
        $role = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
        return $role;
    }


    //получить аватар пользователя
    public static function getUser_avatar_url($id = null){
        if(empty($id)){
            $avatar = Profile::find()->where(['user_id' => Yii::$app->user->id])->one()->avatar;
        }
        else{
            $avatar = Profile::find()->where(['user_id' => $id])->one()->avatar;
        }

        if(empty($avatar)){
            $avatar = '/img/default_avatar_male.jpg';
        }

        return($avatar);
    }

    public static function get_user_road_nickname($id){
        return User::find()->where(['id' => $id])->one()->road_nickname;
    }

}