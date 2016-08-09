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
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        $query = News::find();

        $newsCount = $query->count();

        $news = $query
            ->limit(10)
            ->orderBy('dt_add')
            ->all();

        $page = 1;


        return $this->render('index',
            [
                'news' => $news,
                'blogCount' => $newsCount,
                'page' => $page,
                'limit' => 10,
            ]);


        //return $this->render('index');
    }

    public function actionAjax_get_news(){
        $query = News::find();

        $newsCount = $query->count();

        $news = $query
            ->offset($_POST['page'] * 10)
            ->limit(10)
            ->orderBy('dt_add')
            ->all();

        return $this->renderPartial('ajaxNews',
            [
                'news' => $news,
                'blogCount' => $newsCount,
                'page' => $_POST['page'],
                'limit' => 10,
            ]);
    }


    public function actionViews(){
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        $news = News::findOne(['slug' => $_GET['slug']]);
        return $this->render('views', ['news' => $news]);
    }
}
