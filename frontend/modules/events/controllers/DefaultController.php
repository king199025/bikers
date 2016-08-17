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
        $events = Events::find()
                ->leftJoin('City','`City`.`ID` = `events`.`city`')
                ->with('city')
                ->asArray()
                ->all();
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
            //\Yii::trace('model saved');
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
            'model' => Events::findOne(['id'=>$id]),
        ]);
    }
    
    public function actionAjax_get_events()
    {
        $query = Events::find();

        $eventsCount = $query->count();

        $events = $query
            ->offset($_POST['page'] * 12)
            ->limit(12)
            ->all();

        return $this->renderPartial('ajaxEvents',
            [
                'events' => $events,
                'eventsCount' => $eventsCount,
                'page' => $_POST['page'],
                'limit' => 12,
            ]);
    }
    
    public function actionAjax_find_event_by_word()
    {
        $word = $_POST['word'];
        $city = City::find()->where(['Name'=>$word]);
        $event = Events::find()->where(['name'=>$word]);
        $club = Clubs::find()->where(['name'=>$word]);
        //TODO: todo
    }
    
    public function actionAjax_find_events()
    {
        $type = $_POST['type'];
        $events = Events::find()
                ->where(['type' => $type]);
        $eventsCount = $events->count();
        $events = $events->limit(8)->all();
        return $this->renderAjax('ajaxEvents',
                [
                'events' => $events,
                'eventsCount' => $eventsCount,
                'page' => 1,
                'limit' => 8,
            ]);
    }
}
