<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "bookmarks".
 *
 * @property integer $id
 * @property integer $user
 * @property integer $event
 *
 * @property Events $event0
 * @property User $user0
 */
class Bookmarks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookmarks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'event'], 'integer'],
            [['event'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['event' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
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
            'event' => 'Event',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent0()
    {
        return $this->hasOne(Events::className(), ['id' => 'event']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
}
