<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "clubs".
 *
 * @property integer $id
 * @property string $name
 * @property integer $city
 * @property integer $phone
 * @property string $email
 * @property string $skype
 * @property string $site_url
 * @property string $vk_url
 * @property string $fb_url
 * @property string $ok_url
 * @property integer $photos
 * @property double $lon
 * @property double $lat
 * @property string $about
 * @property integer $type
 * @property string $promo
 * @property integer $created
 */
class Clubs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clubs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'city'], 'required'],
            [['city', 'phone', 'photos','type','created'], 'integer'],
            [['lon', 'lat'], 'number'],
            [['name','promo'], 'string', 'max' => 64],
            [['email', 'skype', 'site_url', 'vk_url', 'fb_url', 'ok_url'], 'string', 'max' => 32],
            [['about'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'city' => 'City',
            'phone' => 'Phone',
            'email' => 'Email',
            'skype' => 'Skype',
            'site_url' => 'Site Url',
            'vk_url' => 'Vk Url',
            'fb_url' => 'Fb Url',
            'ok_url' => 'Ok Url',
            'photos' => 'Photos',
            'lon' => 'Lon',
            'lat' => 'Lat',
            'about' => 'About',
            'type' => 'Type',
            'promo' => 'Promo',
            'created' => 'Created'
        ];
    }
}
