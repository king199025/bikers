<?php

namespace frontend\modules\garage\controllers;

use common\classes\Debug;
use common\models\db\CarMark;
use common\models\db\CarModel;
use Yii;
use frontend\modules\garage\models\Garage;
use frontend\modules\garage\models\GarageSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GarageController implements the CRUD actions for Garage model.
 */
class GarageController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    /*[
                        'allow' => true,
                        'actions' => ['search','view'],
                        'roles' => ['?'],
                    ],*/
                ],
            ],
        ];
    }

    /**
     * Lists all Garage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GarageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Garage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Garage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Garage();
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            $mark = CarMark::find()->where(['id_car_type' => 20])->orderBy('name')->all();

            return $this->render('create', [
                'model' => $model,
                'mark' => $mark,
            ]);
        }
    }

    /**
     * Updates an existing Garage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Garage model.
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
     * Finds the Garage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Garage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Garage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionShow_select_model(){
        $model = CarModel::find()->where(['id_car_mark' => $_POST['id']])->orderBy('name')->all();
        $model = ArrayHelper::map($model, 'id_car_model', 'name');
        echo $city = json_encode($model, JSON_UNESCAPED_UNICODE);
    }
}
