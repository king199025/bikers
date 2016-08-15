<?php

namespace frontend\modules\clubs\controllers;

use yii\web\Controller;
use common\models\db\Clubs;
use common\models\db\City;
use common\models\db\ClubTypes;
use Yii;
/**
 * Default controller for the `modules` module
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
        $query = Clubs::find();

        $clubsCount = $query->count();

        $clubs = $query
            ->limit(12)
            ->all();

        $page = 1;
        
        $clubTypes = ClubTypes::find()->all();


        return $this->render('index',
            [
                'clubs' => $clubs,
                'clubsCount' => $clubsCount,
                'page' => $page,
                'limit' => 12,
                'clubTypes' => $clubTypes
            ]);
        //return $this->render('index');
    }
    public function actionView()
    {
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        setlocale(LC_TIME, 'ru_RU');
        $club = Clubs::findOne(['id' => $_GET['id']]);
        $club['city'] = City::findOne(['ID' => $club['city']])->Name;
        $club['created'] = strftime("%d %B %Y",$club['created']);
        return $this->render('view', ['club' => $club]);
    }
    
    public function actionAjax_find_clubs()
    {
        $type = $_POST['type'];
        $clubs = Clubs::find()
                ->where(['type' => $type]);
        $clubsCount = $clubs->count();
        $clubs = $clubs->limit(12)->all();
        return $this->renderAjax('ajaxClubs',
                [
                'clubs' => $clubs,
                'clubsCount' => $clubsCount,
                'page' => 1,
                'limit' => 12,
            ]);
    }
    
    public function actionAjax_get_clubs()
    {
        $query = Clubs::find();

        $clubsCount = $query->count();

        $clubs = $query
            ->offset($_POST['page'] * 12)
            ->limit(12)
            ->all();

        return $this->renderPartial('ajaxClubs',
            [
                'clubs' => $clubs,
                'clubsCount' => $clubsCount,
                'page' => $_POST['page'],
                'limit' => 12,
            ]);
    }
    public function actionCreate()
    {
        $model = new Clubs();
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        } 
        else 
        {
            $cityList = City::find()->select([ 'name as label','id as value'])
                ->asArray()
                ->all();
            $types = ClubTypes::find()->all();
            return $this->render('create', [
                'model' => $model,
                'cityList' => $cityList,
                'types' => $types
            ]);
        }
    }
}
