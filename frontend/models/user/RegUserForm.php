<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 04.05.2016
 * Time: 13:12
 */

namespace frontend\models\user;



use dektrium\user\models\RegistrationForm;;
use dektrium\user\models\User;
use Yii;

class RegUserForm extends RegistrationForm
{
    /**
     * @var string
     */
    public $road_nickname;
    public $floor;
    public $birthday;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules['road_nicknameRequired'] = ['road_nickname', 'required'];
        $rules['road_nicknameLength']   = ['road_nickname', 'string', 'max' => 10];

        $rules['floor']   = ['floor', 'integer'];

        $rules['birthdayLength']   = ['birthday', 'integer'];
        return $rules;
    }

    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);

        if (!$user->register()) {
            return false;
        }



        return true;
    }

}