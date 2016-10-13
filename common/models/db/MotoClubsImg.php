<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "moto_clubs_img".
 *
 * @property integer $id
 * @property string $img
 * @property integer $moto_club_id
 */
class MotoClubsImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'moto_clubs_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img', 'moto_club_id'], 'required'],
            [['moto_club_id'], 'integer'],
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
            'img' => 'Img',
            'moto_club_id' => 'Moto Club ID',
        ];
    }
}
