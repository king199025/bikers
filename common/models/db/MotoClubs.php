<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "moto_clubs".
 *
 * @property integer $id
 * @property string $name_rus
 * @property string $name_en
 * @property integer $type
 * @property integer $filial
 * @property string $address
 * @property string $logo
 * @property integer $dt_start
 * @property string $site
 * @property string $group_vk
 * @property string $group_fb
 * @property string $group_ok
 * @property string $email
 * @property string $phone
 * @property string $skype
 * @property string $description
 * @property string $slug
 * @property integer $status
 * @property integer $user_id
 * @property integer $city_id
 */
class MotoClubs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'moto_clubs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_rus', 'name_en', 'filial',  'user_id', 'city_id'], 'required'],
            [['type', 'filial', 'status', 'user_id', 'city_id'], 'integer'],
            [['description'], 'string'],
            [['name_rus', 'name_en', 'address', 'site', 'group_vk', 'group_fb', 'group_ok', 'email', 'phone', 'skype', 'slug'], 'string', 'max' => 255],
            [['dt_start'], 'default', 'value' => null],
            [['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_rus' => 'Name Rus',
            'name_en' => 'Name En',
            'type' => 'Type',
            'filial' => 'Filial',
            'address' => 'Address',
            'logo' => 'Logo',
            'dt_start' => 'Dt Start',
            'site' => 'Site',
            'group_vk' => 'Group Vk',
            'group_fb' => 'Group Fb',
            'group_ok' => 'Group Ok',
            'email' => 'Email',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'description' => 'Description',
            'slug' => 'Slug',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }
}
