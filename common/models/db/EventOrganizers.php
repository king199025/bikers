<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "event_organizers".
 *
 * @property integer $id
 * @property integer $event_id
 * @property integer $club_id
 * @property integer $user_id
 */
class EventOrganizers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_organizers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'club_id'], 'required'],
            [['event_id', 'club_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'club_id' => 'Club ID',
            'user_id' => 'User ID',
        ];
    }
    public function getEvent()
    {
        return $this->hasOne(Events::className(),['id'=>'event_id']);
    }
    public function getClub()
    {
        return $this->hasOne(Clubs::className(),['id'=>'club_id']);
    }
}
