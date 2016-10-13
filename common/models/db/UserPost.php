<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user_post".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property integer $dt_add
 * @property integer $dt_update
 */
class UserPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title'], 'required'],
            [['user_id', 'dt_add', 'dt_update'], 'integer'],
            [['content'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'content' => 'Content',
            'slug' => 'Slug',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
        ];
    }
}
