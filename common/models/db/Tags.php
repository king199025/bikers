<?php

namespace common\models\db;

use Yii;
use sjaakp\taggable\TagBehavior;
/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $name
 * @property integer $count
 *
 * @property EventsTags[] $eventsTags
 * @property Events[] $events
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    
    public function behaviors() {
        return [
            'tag' => [
                'class' => TagBehavior::className(),
                'junctionTable' => 'events_tags'
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 32],
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
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventsTags()
    {
        return $this->hasMany(EventsTags::className(), ['tags_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['id' => 'events_id'])->viaTable('events_tags', ['tags_id' => 'id']);
    }
}
