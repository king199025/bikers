<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 04.10.2016
 * Time: 13:21
 */

namespace backend\modules\clubs\models;


use common\models\db\MotoClubs;

class Clubs extends MotoClubs
{
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name_rus',
                'out_attribute' => 'slug',
                'translit' => true
            ],
        ];
    }
}