<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user_photo".
 *
 * @property integer $id
 * @property integer $album_id
 * @property string $img
 * @property integer $user_id
 */
class UserPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id', 'user_id'], 'required'],
            [['album_id', 'user_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album_id' => 'Album ID',
            'img' => 'Img',
            'user_id' => 'User ID',
        ];
    }
}
