<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 10.10.2016
 * Time: 15:46
 */

namespace frontend\modules\user_post\models;


use yii\db\ActiveRecord;

class UserPost extends \common\models\db\UserPost
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'title',
                'out_attribute' => 'slug',
                'translit' => true
            ],
        ];
    }

}