<?php

namespace common\models\db;


use Yii;
use sjaakp\taggable\TaggableBehavior;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $name
 * @property integer $city
 * @property integer $city_near
 * @property double $lon
 * @property double $lat
 * @property integer $dt_start
 * @property integer $dt_end
 * @property string $site_url
 * @property string $vk_url
 * @property string $ok_url
 * @property string $fb_url
 * @property string $other_link1
 * @property string $other_link2
 * @property string $other_link3
 * @property file $afisha
 * @property integer $type
 * @property integer $organizer
 * @property integer $tags
 * @property string $program
 * @property integer $user_id
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }
    
    
    /*public function behaviors() {
        return [
            'taggable' => [
                'class' => TaggableBehavior::className(),
                'tagClass' => Tags::className(),
                'junctionTable' => 'events_tags'
            ]
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'dt_start', 'type'], 'required'],
            [['city', 'city_near', 'dt_start', 'dt_end', 'type', 'organizer', 'tags', 'user_id'], 'integer'],
            [['lon', 'lat'], 'number'],
            [['name'], 'string', 'max' => 256],
            [['site_url', 'vk_url', 'ok_url', 'fb_url', 'other_link1', 'other_link2', 'other_link3'], 'string', 'max' => 64],
            [['afisha'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],

            [['program'],'string','max' => 5000]
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
            'city_near' => 'City Near',
            'lon' => 'Lon',
            'lat' => 'Lat',
            'dt_start' => 'Dt Start',
            'dt_end' => 'Dt End',
            'site_url' => 'Site Url',
            'vk_url' => 'Vk Url',
            'ok_url' => 'Ok Url',
            'fb_url' => 'Fb Url',
            'other_link1' => 'Other Link1',
            'other_link2' => 'Other Link2',
            'other_link3' => 'Other Link3',
            'afisha' => 'Afisha',
            'type' => 'Type',
            'organizer' => 'Organizer',
            'tags' => 'Tags',
            'program' => 'Program'
        ];
    }
    
    public function getCity()
    {
        return $this->hasOne(City::className(), ['ID' => 'city']);
    }
    public function getType()
    {
        return $this->hasOne(EventTypes::className(),['id'=>'type']);
    }
    public function gettype_events()
    {
        return $this->hasOne(EventTypes::className(),['id'=>'type']);
    }
}
