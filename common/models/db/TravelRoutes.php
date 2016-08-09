<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "travel_routes".
 *
 * @property integer $id
 * @property integer $travel_id
 * @property integer $from_city_id
 * @property integer $to_city_id
 */
class TravelRoutes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'travel_routes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['travel_id', 'from_city_id', 'to_city_id'], 'required'],
            [['travel_id', 'from_city_id', 'to_city_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'travel_id' => 'Travel ID',
            'from_city_id' => 'From City ID',
            'to_city_id' => 'To City ID',
        ];
    }
}
