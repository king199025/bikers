<?php

namespace frontend\modules\travels\controllers;

use common\classes\Debug;
use common\models\db\City;
use common\models\db\Travel;
use common\models\db\TravelRoutes;
use kartik\select2\Select2;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\JsExpression;

/**
 * Default controller for the `travels` module
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        //Debug::prn($model);
        return $this->render('index');
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];

        $model = new Travel();

        if ($model->load(Yii::$app->request->post()) /*&& $model->save(false)*/) {
            $model->user_id = Yii::$app->user->id;
            $date = new \DateTime();
            $model->dt_add = $date->format('d.m.Y');
            $model->dt_update = $date->format('d.m.Y');
            
            $routes = [];
            
            Debug::prn($model);

            //return $this->redirect(['index'/*, 'id' => $model->id*/]);
        } else {
            $cityList = City::find()->select([ 'name as label','id as value'])
                ->asArray()
                ->all();
            return $this->render('create', [
                'model' => $model,
                'cityList' => $cityList,
            ]);
        }
    }

    public function actionCitylist($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id, name AS text')
                ->from('city')
                ->where(['like', 'name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => City::find()->where(['id' => $id])->one()->name];
        }
        return $out;
    }

    public function actionAjax_get_city_info(){
        $idstart = $_POST['idstart'];
        $idend = $_POST['idend'];

        $waypoints = $_POST['waypoints'];

        $waypoints = explode(',', $waypoints);

        array_splice($waypoints, -1);


        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['lon' => '', 'lat' => '']];

        //Старт
        if(!empty($idstart)){
            $query = new Query;
            $query->select('lon, lat')
                ->from('city')
                ->where(['id' => $idstart]);

            $command = $query->createCommand();
            $data = $command->queryAll();

            $out['results'][] = array_values($data);
        }

//Промежуточные точки


        if(!empty($waypoints[0])) {
//Debug::prn($waypoints);

            foreach ($waypoints as $item) {
                $query = new Query;
                $query->select('lon, lat')
                    ->from('city')
                    ->where(['id' => $item]);
                $command = $query->createCommand();
                $data = $command->queryAll();

                $out['results'][] = array_values($data);
            }
        }




        //Конец
        if(!empty($idend)){
            $query = new Query;
            $query->select('lon, lat')
                ->from('city')
                ->where(['id' => $idend]);
            $command = $query->createCommand();
            $data = $command->queryAll();

            $out['results'][] = array_values($data);
        }
        //Debug::prn($out);
        return $out;

    }


    public function actionAjax_add_field(){
        $listdata = \common\models\db\City::find()
            ->select(['id as value', 'name as label'])
            ->asArray()
            ->all();
        /*Yii::$app->clientScript->scriptMap =
            [
                'jquery.js'                 => false,
                'jquery.ui.js'                 => false,
                'jquery.yiiactiveform.js'     => false,
            ];*/

        return $this->renderAjax('fields-city',['listdata' => $listdata]);
    }


    public function actionGetcity($term=null)
    {
        //$data = array("Москва", "Киев", "cat", "tiger");
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $query = new Query;
        $query->select('id, name AS text')
            ->from('city')
            ->where(['like', 'name', $term])
            ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();

       // Debug::prn($data);
        //$out[] = array_values($data);
        $datal = [];
        foreach ($data as $item) {
            $datal[$item['id']] = $item['text'];
        }
        //Debug::prn($datal);

        return $datal;
    }
}
