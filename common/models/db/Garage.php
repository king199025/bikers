<?php

namespace common\models\db;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "garage".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $mark_id
 * @property integer $model_id
 * @property integer $year
 * @property integer $volume
 * @property integer $used
 *
 * @property User $user
 * @property ImgMoto[] $imgMotos
 */
class Garage extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'garage';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'mark_id', 'model_id', 'year', 'volume', 'used'], 'required'],
            [['user_id', 'mark_id', 'model_id', 'year', 'volume', 'used'], 'integer'],
            [['year'], 'compare', 'compareValue' => +date('Y'), 'operator' => '<='],
            [['year'], 'integer', 'max' => +date('Y'), 'min' => '1950'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'mark_id' => 'Mark ID',
            'model_id' => 'Model ID',
            'year' => 'Year',
            'volume' => 'Volume',
            'used' => 'Used',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImgMotos() {
        return $this->hasMany(ImgMoto::className(), ['garage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery 
     */
    public function getcar_mark(){
        return $this->hasOne(CarMark::className(), ['id_car_mark' => 'mark_id']);
    }
    
    public function getcar_model(){
        return $this->hasOne(CarModel::className(), ['id_car_model' => 'model_id']);
    }

}
