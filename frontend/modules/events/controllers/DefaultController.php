<?php

namespace frontend\modules\events\controllers;

use yii\web\Controller;
use \common\models\db\Events;
use \common\models\db\EventTypes;
use common\models\db\City;
use Yii;
/**
 * Default controller for the `events` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $events = Events::find()->all();
        $types = EventTypes::find()->all();
        return $this->render('index',[
            'events' => $events,
            'types' => $types
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Events();
        $cityList = City::find()->select([ 'name as label','id as value'])
                ->asArray()
                ->all();
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        if ($model->load(Yii::$app->request->post())&& $model->save(false)) {

            //return "<pre>".var_dump($model->save())."</pre>";
            return $this->redirect(['index']);
        } 
        else 
        {
            $typesList = EventTypes::find()->asArray()->all();
            return $this->render('create', [
                'model' => $model,
                'typesList' => $typesList,
                'cityList' => $cityList
            ]);
        }
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
