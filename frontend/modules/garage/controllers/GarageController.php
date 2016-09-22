<?php

namespace frontend\modules\garage\controllers;

use common\classes\Debug;
use common\models\db\CarMark;
use common\models\db\CarModel;
use common\models\db\Events;
use common\models\db\ImgMoto;
use Yii;
use frontend\modules\garage\models\Garage;
use frontend\modules\garage\models\GarageSearch;
use yii\base\Event;
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
        /*\Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];*/

        $mark = CarMark::find()->where(['id_car_type' => 20])->orderBy('name')->all();
        $model = new Garage();

        $userMoto = Garage::find()
            ->leftJoin('img_moto', '`img_moto`.`garage_id` = `garage`.`id`')
            ->leftJoin('car_mark', '`car_mark`.`id_car_mark` = `garage`.`mark_id`')
            ->leftJoin('car_model', '`car_model`.`id_car_model` = `garage`.`model_id`')
            ->where(['`garage`.`user_id`' => Yii::$app->user->id])
            ->with('img_moto', 'car_mark', 'car_model')
            ->all();

//Debug::prn($userMoto);
        return $this->render('index', [
            'mark' => $mark,
            'model' => $model,
            'userMoto' => $userMoto,
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
        /*\Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];*/
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            ImgMoto::updateAll(['garage_id' => $model->id], ['garage_id' => 99999, 'user_id' => Yii::$app->user->id]);

            return $this->redirect(['index']);
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
        /*\Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];*/
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            ImgMoto::updateAll(['garage_id' => $model->id], ['garage_id' => 99999, 'user_id' => Yii::$app->user->id]);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $mark = CarMark::find()->where(['id_car_type' => 20])->orderBy('name')->all();
            $carmodel = CarModel::find()->where(['id_car_mark' => $model->mark_id])->all();
            $img = ImgMoto::find()->where(['garage_id' => $id])->all();
            return $this->render('update', [
                'model' => $model,
                'mark' => $mark,
                'carmodel' => $carmodel,
                'img' => $img,
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

    public function actionUpload_file(){

        //Debug::prn($_FILES);
        if (!file_exists('media/users/' . Yii::$app->user->id)) {
            mkdir('media/users/' . Yii::$app->user->id . '/');
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
        }
        $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
        $i = 0;

        if (!empty($_FILES['file']['name'][0])) {
            ImgMoto::deleteAll(['garage_id' => 99999, 'user_id' => Yii::$app->user->id]);
            foreach ($_FILES['file']['name'] as $file) {

                move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir . $file);
                $img = new ImgMoto();
                $img->garage_id = 99999;
                $img->img = $dir . $file;

                $img->user_id = Yii::$app->user->id;
                $img->save();

                $i++;
            }
        }
        echo 1;
    }

    public function actionDelete_file(){
        ImgMoto::deleteAll(['id' => $_GET['id']]);
        echo 1;
    }
}
