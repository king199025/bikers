<?php

namespace common\models\db;

use frontend\models\user\UserDec;
use Yii;

/**
 * This is the model class for table "user_warning".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $new_events
 * @property integer $bookmark_events
 * @property integer $new_clubs
 * @property integer $new_post
 * @property integer $new_news
 * @property integer $new_travel
 * @property integer $bookmark_travel
 */
class UserWarning extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_warning';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'new_events', 'bookmark_events', 'new_clubs', 'new_post', 'new_news', 'new_travel', 'bookmark_travel'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'new_events' => 'New Events',
            'bookmark_events' => 'Bookmark Events',
            'new_clubs' => 'New Clubs',
            'new_post' => 'New Post',
            'new_news' => 'New News',
            'new_travel' => 'New Travel',
            'bookmark_travel' => 'Bookmark Travel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getuser()
    {
        return $this->hasOne(UserDec::className(), ['id' => 'user_id']);
    }


}
