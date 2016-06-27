<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "img_moto".
 *
 * @property integer $id
 * @property integer $garage_id
 * @property string $img
 * @property integer $user_id
 */
class ImgMoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'img_moto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['garage_id', 'img', 'user_id'], 'required'],
            [['garage_id', 'user_id'], 'integer'],
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
            'garage_id' => 'Garage ID',
            'img' => 'Img',
            'user_id' => 'User ID',
        ];
    }
}
