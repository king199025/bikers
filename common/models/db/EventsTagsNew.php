<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "events_tags_new".
 *
 * @property integer $id
 * @property integer $events_id
 * @property string $tags
 */
class EventsTagsNew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events_tags_new';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['events_id', 'tags'], 'required'],
            [['events_id'], 'integer'],
            [['tags'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'events_id' => 'Events ID',
            'tags' => 'Tags',
        ];
    }
}
