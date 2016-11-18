<?php

namespace common\models\db;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "moto_clubs_personal".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $club_id
 * @property string $position
 * @property string $link_vk
 * @property string $phone
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
            [['user_id', 'club_id', 'position', 'link_vk', 'phone'], 'required'],
            [['user_id', 'club_id'], 'integer'],
            [['position', 'link_vk', 'phone'], 'string', 'max' => 255],
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
            'club_id' => 'Club ID',
            'position' => 'Position',
            'link_vk' => 'Link Vk',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getuser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getprofile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'user_id']);
    }
}
