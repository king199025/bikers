<?php

namespace frontend\modules\events\controllers;

use common\classes\Debug;
use common\models\User;
use Yii;
use common\models\db\Events;
use common\models\db\City;
use common\models\db\Region;
use common\models\db\EventTypes;
use common\models\EventsSearch;
use common\models\db\EventsUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * DefaultController implements the CRUD actions for Events model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventsSearch();
        //\common\classes\Debug::prn($searchModel);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $types = EventTypes::find()->all();
        $regions = Region::find()->select([ 'Name as label','ID as value'])
            ->asArray()
            ->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'types' => $types,
            'regions' => $regions
        ]);
    }

    /**
     * Displays a single Events model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $participants = User::find()
            ->leftJoin('`events_user`','`events_user`.`user_id` = `user`.`id`')
            ->where(['`events_user`.`events_id`' => $id])
            ->count();
        $city = City::find()->where('`City`.`ID`=`events`.`city`')->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'participants' => $participants,
            'city' => $city
        ]);
    }

    /**
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
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
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $typesList = EventTypes::find()->asArray()->all();
            return $this->render('create', [
                'model' => $model,
                'typesList' => $typesList,
                'cityList' => $cityList
            ]);
        }
    }

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else
        {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionCopy($id)
    {
        $model = $this->findModel($id);

        $new_model = new Events();
        $data = $model->attributes;
        $data['id'] = null;
        $new_model->attributes = $data;
        if($new_model->save(false))
        {
            return $this->redirect(['view', 'id' => $new_model->id]);
        }
        else
        {
            Debug::prn($new_model);
            die;
            return $this->redirect('index');
        }
    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
