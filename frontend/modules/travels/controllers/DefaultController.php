<?php

namespace frontend\modules\travels\controllers;

use common\classes\Debug;
use common\classes\Notification;
use common\models\db\City;
use common\models\db\Garage;
use common\models\db\Travel;
use common\models\db\TravelBookmark;
use common\models\db\TravelRoutes;
use kartik\select2\Select2;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\imagine\Image;
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
                        'actions' => ['index', 'ajax_get_city_info', 'ajax_add_field', 'ajax_get_travel', 'ajax_find_travels', 'search_travel', 'view'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create','ajax_add_bookmark'],
                        'roles' => ['@'],
                    ],
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
        $travels = Travel::find()->where(['status' => 1])
                ->asArray()
                ->all();
        $cityList = City::find()->select([ 'name as label','id as value'])
                ->asArray()
                ->all();
        
        return $this->render('index', [
                'travels'=>$travels,
                'cityList' => $cityList,
                ]);
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


        Notification::sendMailUser('new_travel', 1);
        $cityList = City::find()->select([ 'name as label','id as value'])
            ->asArray()
            ->all();
        $model = new Travel();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->user_id = Yii::$app->user->id;
            $date = time();
            $model->dt_add = $date;
            $model->dt_update = $date;
            if(isset($_FILES['Travel']['name'])){
                if (!file_exists('media/users/' . Yii::$app->user->id)) {
                    mkdir('media/users/' . Yii::$app->user->id . '/');
                }
                if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
                    mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
                }
                $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';

                $extension = strtolower(substr(strrchr($_FILES['Events']['name']['afisha'], '.'), 1));

                Image::thumbnail($_FILES['Travel']['tmp_name']['icon'], 600, 800, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($dir . $_FILES['Travel']['name']['icon'], ['quality' => 100]);

                $model->icon = '/' . $dir . $_FILES['Travel']['name']['icon'];
            }
            
            if(isset($_POST['dotCity'])&& $model->save(false))
            {
                foreach ($_POST['dotCityId'] as $item)
                {
                    $temp = new TravelRoutes(['travel_id'=>$model->id,'city_id'=>$item]);
                    if(!$temp->save())
                        Debug::prn($temp);
                }
            }

            //$travels = Travel::find()->asArray()->all();
            
            
            
            return $this->redirect('index');
        } 
        else {
            $motoUser = Garage::find()->where(['user_id' => Yii::$app->user->id])->count();
           if($motoUser == 0){
                return $this->render('error');
           }else{
               return $this->render('create', [
                   'model' => $model,
                   'cityList' => $cityList,
               ]);
           }



        }
    }
    
    public function actionAjax_find_travels()
    {   
        $q = ['user_id'=>Yii::$app->user->id];
        if(isset($_POST['date']) && !empty($_POST['date']))
        {
            $q['dt_start']=$_POST['date'];
        }
        if(isset($_POST['city_start']) && !empty($_POST['city_start']))
        {
            $q['city_start']=$_POST['city_start'];
        }
        if(isset($_POST['city_end']) && !empty($_POST['city_end']))
        {
            $q['city_end']=$_POST['city_end'];
        }
        //return var_dump($q);
        $travels = Travel::find()->where($q)
                ->asArray()
                ->all();
        $cityList = City::find()->select([ 'name as label','id as value'])
                ->asArray()
                ->all();
        
        if(empty($travels))
        {
            $travels = Travel::find()->where("user_id = ".Yii::$app->user->id)
                    ->asArray()
                    ->all();
        }
        
        return $this->renderAjax('travels_list', [
                'travels'=>$travels,
                'cityList' => $cityList,
                ]);
    }

    public function actionSearch_travel(){
        //Debug::prn($_POST);

        $travels = Travel::find()
            ->andFilterWhere(['LIKE', 'dt_start' , $_POST['date']])
            ->andFilterWhere(['city_start' => $_POST['city_start']])
            ->andFilterWhere(['city_end' => $_POST['city_end']])
            ->asArray()
            ->all();

        $cityList = City::find()->select([ 'name as label','id as value'])
            ->asArray()
            ->all();
        return $this->renderPartial('travels_list', [
            'travels'=>$travels,
            'cityList' => $cityList,
        ]);
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

    public function actionAjax_add_bookmark()
    {
        $id = Yii::$app->request->post('travel');
        $model = new TravelBookmark();
        $model->travel = $id;
        $model->user = Yii::$app->getUser()->id;
        if($model->save())
        {
            return 'OK';
        }
        else
            return 'ERROR';

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
                ->from('City')
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
                    ->from('City')
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
                ->from('City')
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
    
    public function actionAjax_get_travel()
    {
        //return $_POST['id'];
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $travel = Travel::find()->where('id = '.$id)
                    ->one();
            $cityStart = City::find()
                    ->select('Name')
                    ->where('ID = '.$travel->city_start)
                    ->one();
            $cityEnd = City::find()
                    ->select('Name')
                    ->where('ID = '.$travel->city_end)
                    ->one();
            $moto = \frontend\modules\garage\models\Garage::find()
                    ->leftJoin('car_mark','`garage`.`mark_id` = `car_mark`.`id_car_mark`')
                    ->leftJoin('car_model','`garage`.`model_id` = `car_model`.`id_car_model`')
                    ->where(['`garage`.`id`'=>$travel->moto_id])
                    ->one();
            $route = City::find()
                    ->leftJoin('travel_routes','`travel_routes`.`city_id` = `City`.`ID`')
                    ->where(['travel_id'=>$id])
                    ->all();
            return /*$route->createCommand()->rawSql;*/$this->renderAjax('travel',
                    [
                        'travel'=>$travel,
                        'moto'=>$moto,
                        'route'=>$route,
                        'cityStart'=>$cityStart,
                        'cityEnd'=>$cityEnd
                    ]);
        }
        else
            return null;
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

    public function actionView($id){
        $travels = Travel::find()->where(['status' => 1])
            ->asArray()
            ->all();
        $cityList = City::find()->select([ 'name as label','id as value'])
            ->asArray()
            ->all();



        $travel = Travel::find()->where('id = '.$id)
            ->one();
        $cityStart = City::find()
            ->select('Name')
            ->where('ID = '.$travel->city_start)
            ->one();
        $cityEnd = City::find()
            ->select('Name')
            ->where('ID = '.$travel->city_end)
            ->one();
        $moto = \frontend\modules\garage\models\Garage::find()
            ->leftJoin('car_mark','`garage`.`mark_id` = `car_mark`.`id_car_mark`')
            ->leftJoin('car_model','`garage`.`model_id` = `car_model`.`id_car_model`')
            ->where(['`garage`.`id`'=>$travel->moto_id])
            ->one();
        $route = City::find()
            ->leftJoin('travel_routes','`travel_routes`.`city_id` = `City`.`ID`')
            ->where(['travel_id'=>$id])
            ->all();
        return $this->render('view', [
            'travels'=>$travels,
            'cityList' => $cityList,
            'travel'=>$travel,
            'moto'=>$moto,
            'route'=>$route,
            'cityStart'=>$cityStart,
            'cityEnd'=>$cityEnd
        ]);
    }
}
