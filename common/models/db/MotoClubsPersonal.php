<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "moto_clubs_personal".
 *
 * @property integer $id
 * @property string $photo
 * @property string $position
 * @property string $link
 * @property string $phone
 * @property integer $miti_club_id
 */
class MotoClubsPersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'moto_clubs_personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'miti_club_id'], 'required'],
            [['miti_club_id'], 'integer'],
            [['photo', 'position', 'link', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'position' => 'Position',
            'link' => 'Link',
            'phone' => 'Phone',
            'miti_club_id' => 'Miti Club ID',
        ];
    }
}
