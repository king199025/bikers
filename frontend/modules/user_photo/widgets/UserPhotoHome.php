<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 06.10.2016
 * Time: 14:38
 */

namespace frontend\modules\user_photo\widgets;


use common\models\db\UserPhoto;
use yii\base\Widget;

class UserPhotoHome extends Widget
{
    public function run(){
        $photo = UserPhoto::find()->orderBy('RAND()')->limit(12)->all();
        return $this->render('user-photo', ['photo' => $photo]);
    }
}