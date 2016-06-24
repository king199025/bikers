<?php

namespace frontend\modules\news\controllers;

use common\classes\Debug;
use common\models\db\News;
use yii\web\Controller;

/**
 * Default controller for the `news` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionViews(){

        $news = News::findOne(['slug' => $_GET['slug']]);
        return $this->render('views', ['news' => $news]);
    }
}
