<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "travel".
 *
 * @property integer $id
 * @property string $name
 * @property integer $city_start
 * @property integer $city_end
 * @property string $dt_start
 * @property string $description
 * @property string $slug
 * @property integer $dt_add
 * @property integer $dt_update
 * @property integer $moto_id
 * @property integer $user_id
 * @property integer $status
 * @property string $icon
 * @property integer $distance
 *
 * @property TravelBookmark[] $travelBookmarks
 */
class Travel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'travel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'city_start', 'city_end', 'dt_start', 'slug', 'dt_add', 'dt_update', 'moto_id', 'user_id', 'status', 'icon', 'distance'], 'required'],
            [['city_start', 'city_end', 'dt_add', 'dt_update', 'moto_id', 'user_id', 'status', 'distance'], 'integer'],
            [['description'], 'string'],
            [['name', 'slug', 'icon'], 'string', 'max' => 255],
            [['dt_start'], 'string', 'max' => 20],
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
            'city_start' => 'City Start',
            'city_end' => 'City End',
            'dt_start' => 'Dt Start',
            'description' => 'Description',
            'slug' => 'Slug',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'moto_id' => 'Moto ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'icon' => 'Icon',
            'distance' => 'Distance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravelBookmarks()
    {
        return $this->hasMany(TravelBookmark::className(), ['travel' => 'id']);
    }
}
