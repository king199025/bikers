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
        return $this->render('index');
    }
    public function actionView()
    {
        return $this->render('view');
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
