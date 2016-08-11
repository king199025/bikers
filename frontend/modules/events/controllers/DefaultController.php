<?php

namespace frontend\modules\events\controllers;

use yii\web\Controller;
use \common\models\db\Events;
use \common\models\db\EventTypes;
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
        return $this->render('index');
    }
    
    public function actionCreate()
    {
        $model = new Events();
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        } 
        else 
        {
            $typesList = EventTypes::find()->asArray()->all();
            return $this->render('create', [
                'model' => $model,
                'typesList' => $typesList
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
