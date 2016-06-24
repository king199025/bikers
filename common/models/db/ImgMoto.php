<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "img_moto".
 *
 * @property integer $id
 * @property integer $garage_id
 * @property string $img
 *
 * @property Garage $garage
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
            [['garage_id', 'img'], 'required'],
            [['garage_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['garage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Garage::className(), 'targetAttribute' => ['garage_id' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGarage()
    {
        return $this->hasOne(Garage::className(), ['id' => 'garage_id']);
    }
}
