<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property integer $dt_add
 * @property integer $dt_update
 * @property string $short_text
 * @property string $text
 * @property string $slug
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'short_text', 'text', 'slug'], 'required'],
            [['dt_add', 'dt_update'], 'integer'],
            [['text'], 'string'],
            [['name', 'img', 'short_text', 'slug'], 'string', 'max' => 255],
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
            'img' => 'Img',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'short_text' => 'Short Text',
            'text' => 'Text',
            'slug' => 'Slug',
        ];
    }
}
