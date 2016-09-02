<?php

namespace common\models\db;

use common\models\User;
use Yii;

/**
 * This is the model class for table "travel_bookmark".
 *
 * @property integer $id
 * @property integer $user
 * @property integer $travel
 *
 * @property User $user0
 * @property Travel $travel0
 */
class TravelBookmark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'travel_bookmark';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'travel'], 'integer'],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
            [['travel'], 'exist', 'skipOnError' => true, 'targetClass' => Travel::className(), 'targetAttribute' => ['travel' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'travel' => 'Travel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravel0()
    {
        return $this->hasOne(Travel::className(), ['id' => 'travel']);
    }
}
