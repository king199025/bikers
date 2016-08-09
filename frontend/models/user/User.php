<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 23.06.2016
 * Time: 9:19
 */

namespace frontend\models\user;


class User extends \dektrium\user\models\User
{
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'road_nickname';
        $scenarios['update'][]   = 'road_nickname';
        $scenarios['register'][] = 'road_nickname';

        $scenarios['create'][]   = 'floor';
        $scenarios['update'][]   = 'floor';
        $scenarios['register'][] = 'floor';



        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        /*$rules['road_nicknameRequired'] = ['road_nickname', 'required'];*/
        $rules['road_nicknameLength']   = ['road_nickname', 'string'];
        $rules['floorLength']   = ['floor', 'integer'];

        return $rules;
    }
}