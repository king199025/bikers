<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 23.06.2016
 * Time: 9:54
 */

namespace frontend\models\user;


use dektrium\user\traits\ModuleTrait;
use Yii;
use dektrium\user\Module;

class SettingsForm extends \dektrium\user\models\SettingsForm
{
    use ModuleTrait;



    /**
     * @var string
     */
    public $road_nickname;
    /**
     * @inheritdoc
     */



    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'road_nickname';
        $scenarios['update'][]   = 'road_nickname';
        $scenarios['register'][] = 'road_nickname';
        return $scenarios;
    }


    public function rules()
    {
        $rules = parent::rules();

        $rules['road_nicknameLength']   = ['road_nickname', 'string'];
        return $rules;
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'road_nickname'    => 'Дорожное прозвище',
            'email'            => Yii::t('user', 'Email'),
            'username'         => Yii::t('user', 'Username'),
            'new_password'     => Yii::t('user', 'New password'),
            'current_password' => Yii::t('user', 'Current password'),
        ];
    }

    /**
     * Saves new account settings.
     *
     * @return bool
     */
    public function save()
    {
        if ($this->validate()) {
            $this->user->scenario = 'settings';
            $this->user->road_nickname = 'road_nickname';
            $this->user->username = $this->username;
            $this->user->password = $this->new_password;
            if ($this->email == $this->user->email && $this->user->unconfirmed_email != null) {
                $this->user->unconfirmed_email = null;
            } elseif ($this->email != $this->user->email) {
                switch ($this->module->emailChangeStrategy) {
                    case Module::STRATEGY_INSECURE:
                        $this->insecureEmailChange();
                        break;
                    case Module::STRATEGY_DEFAULT:
                        $this->defaultEmailChange();
                        break;
                    case Module::STRATEGY_SECURE:
                        $this->secureEmailChange();
                        break;
                    default:
                        throw new \OutOfBoundsException('Invalid email changing strategy');
                }
            }

            return $this->user->save();
        }

        return false;
    }

}