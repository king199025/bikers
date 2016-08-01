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
        $query = News::find();

        $newsCount = $query->count();

        $news = $query
            ->limit(1)
            ->orderBy('dt_add')
            ->all();

        $page = 1;


        return $this->render('index',
            [
                'news' => $news,
                'blogCount' => $newsCount,
                'page' => $page,
                'limit' => 1,
            ]);


        //return $this->render('index');
    }

    public function actionAjax_get_news(){
        $query = News::find();

        $newsCount = $query->count();

        $news = $query
            ->offset($_POST['page'] * 1)
            ->limit(1)
            ->orderBy('dt_add')
            ->all();

        return $this->renderPartial('ajaxNews',
            [
                'blog' => $news,
                'blogCount' => $newsCount,
                'page' => $_POST['page'],
                'limit' => $this->limit,
            ]);
    }


    public function actionViews(){

        $news = News::findOne(['slug' => $_GET['slug']]);
        return $this->render('views', ['news' => $news]);
    }
}
