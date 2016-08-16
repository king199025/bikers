<?php
namespace app\controllers;
 
use yii\web\Controller;
use common\models\db\Tags;
use sjaakp\taggable\TagSuggestAction;
 
class TagController extends Controller  {
 
    public function actions()    {
        return [
            'suggest' => [
                'class' => TagSuggestAction::className(),
                'tagClass' => Tags::className(),
            ],
        ];
    }
 
}