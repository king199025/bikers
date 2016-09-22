<?php

namespace frontend\modules\events\controllers;

use common\classes\Debug;
use common\models\db\Bookmarks;
use common\models\db\Clubs;
use common\models\db\EventOrganizers;
use common\models\db\ImgEvent;
use common\models\User;
use Yii;
use common\models\db\Events;
use common\models\db\City;
use common\models\db\Region;
use common\models\db\EventTypes;
use common\models\EventsSearch;
use common\models\db\EventsUser;
use yii\db\Connection;
use yii\db\Query;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

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
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];

        $types = EventTypes::find()->all();
        $regions = Region::find()->select([ 'Name as label','ID as value'])
            ->asArray()
            ->all();

        $events = Events::find()
            //->where(['>=','dt_start', time()])
            ->andWhere(['!=', 'status', 0])
            ->andWhere(['!=', 'status', 2])
            ->orderBy('dt_start ASC')
            ->all();


        $db = new Connection(Yii::$app->db);
        $eventsMonth = $db->createCommand('SELECT MONTH( FROM_UNIXTIME( dt_start ) ) AS month , COUNT( * ) FROM events WHERE status != 0 AND status != 2  GROUP BY MONTH( FROM_UNIXTIME( dt_start ) )')->queryAll();

        $arr =
            [
                  [
                      'name' => 'Январь',
                      'month' => 1,
                      'count' => 0
                  ],
                  [
                      'name' => 'Февраль',
                      'month' => 2,
                      'count' => 0
                  ],
                  [
                      'name' => 'Март',
                      'month' => 3,
                      'count' => 0
                  ],
                  [
                      'name' => 'Апрель',
                      'month' => 4,
                      'count' => 0
                  ],
                  [
                      'name' => 'Май',
                      'month' => 5,
                      'count' => 0
                  ],
                  [
                      'name' => 'Июнь',
                      'month' => 6,
                      'count' => 0
                  ],
                  [
                      'name' => 'Июль',
                      'month' => 7,
                      'count' => 0
                  ],
                  [
                      'name' => 'Август',
                      'month' => 8,
                      'count' => 0
                  ],
                  [
                      'name' => 'Сентябрь',
                      'month' => 9,
                      'count' => 0
                  ],
                  [
                      'name' => 'Октябрь',
                      'month' => 10,
                      'count' => 0
                  ],
                  [
                      'name' => 'Ноябрь',
                      'month' => 11,
                      'count' => 0
                  ],
                  [
                      'name' => 'Декабрь',
                      'month' => 12,
                      'count' => 0
                  ],
            ];

        foreach ($arr as $key=>$item) {
            foreach($eventsMonth as $v){
                if($item['month'] == $v['month']){
                    $arr[$key]['count'] = $v['COUNT( * )'];
                }
            }
        }

        $cityList = City::find()->select([ 'name as label','id as value'])
            ->asArray()
            ->all();

        return $this->render('index', [
            /*'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,*/
            'types' => $types,
            'regions' => $regions,
            'events' => $events,
            'eventMonth' => $arr,
            'cityList' => $cityList,
        ]);
    }

    /**
     * Displays a single Events model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        $event = Events::find()
            //->leftJoin(['event_types', '`event_types`.`id` = `events`.`type`'])
            ->where(['`events`.`id`' => $id])
            ->with('type_events')
            ->one();

        $old = Events::find()->where(['name'=>$event['name']])->with('city','type')->orderBy('dt_end')->asArray()->one();

       // Debug::prn($event);


        $participants = EventsUser::find()
            ->where(['events_id' => $id])
            ->count();
       /* $model = Events::find()->where(['id'=>$id])->with('city','type')->asArray()->one();
        $old = Events::find()->where(['name'=>$model['name']])->with('city','type')->orderBy('dt_end')->asArray()->one();
        $old['organizer'] = EventOrganizers::find()
            ->where(['event_id'=>$old['id']])
            //->leftJoin('`clubs`','`clubs`.`id`=`event_organizers`.`club_id`')
            ->with('club')
            ->asArray()
            ->all();
        $model['organizer'] = EventOrganizers::find()
            ->where(['event_id'=>$id])
            //->leftJoin('`clubs`','`clubs`.`id`=`event_organizers`.`club_id`')
            ->with('club')
            ->asArray()
            ->all();

        $old_participants = User::find()
            ->leftJoin('`events_user`','`events_user`.`user_id` = `user`.`id`')
            ->where(['`events_user`.`events_id`' => $old['id']])
            ->count();*/

        return $this->render('view', [
            'event' => $event,
            'participants' => $participants,
            /*'model' => $model,

            'old' =>$old,
            'old_participants' => $old_participants*/
            //'city' => $city
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
        $cityList = City::find()->select(['name as label','id as value'])
                ->asArray()
                ->all();
        $clubsList = Clubs::find()->select(['name as label','id as value'])
            ->asArray()
            ->all();
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
        if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) {

            //Debug::prn($_FILES);
            if(isset($_FILES['Events']['name'])){
                if (!file_exists('media/users/' . Yii::$app->user->id)) {
                    mkdir('media/users/' . Yii::$app->user->id . '/');
                }
                if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
                    mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
                }
                $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';

                $extension = strtolower(substr(strrchr($_FILES['Events']['name']['afisha'], '.'), 1));

                Image::thumbnail($_FILES['Events']['tmp_name']['afisha'], 600, 800, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($dir . $_FILES['Events']['name']['afisha'], ['quality' => 100]);

                $model->afisha = '/' . $dir . $_FILES['Events']['name']['afisha'];
            }

            $model->save();

            if(Yii::$app->request->post('event_organizer')) {
                $org = new EventOrganizers();
                $org->event_id = $model->id;
                $org->club_id = Yii::$app->request->post('event_organizer');
                $org->save();
            }



            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $typesList = EventTypes::find()->all();
            //Debug::prn($typesList);
            return $this->render('create', [
                'model' => $model,
                'typesList' => $typesList,
                'cityList' => $cityList,
                'clubsList' => $clubsList,
                'img' => null
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
        $org = new EventOrganizers();
        $org->event_id = $model->id;
        $org->club_id = Yii::$app->request->post('auto_complete_event_organizer');
        $cityList = City::find()->select([ 'name as label','id as value'])
            ->asArray()
            ->all();
        $clubsList = Clubs::find()->select([ 'name as label','id as value'])
            ->asArray()
            ->all();
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];

        if ($model->load(Yii::$app->request->post()))
        {
            if($org->club_id)
                $org->save(false);

            if( $model->afisha)
            {
                $model->afisha = UploadedFile::getInstance($model, 'afisha');
                $model->afisha->saveAs('media/upload/' . $model->afisha->baseName . '.' . $model->afisha->extension);
                $model->afisha = $model->afisha->baseName . '.' . $model->afisha->extension;

            }
            $model->save(false);
            ImgEvent::updateAll(['event_id' => $model->id], ['event_id' => 99999]);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $typesList = EventTypes::find()->asArray()->all();
            $img = ImgEvent::find()->where(['event_id' => $model->id])->all();
            return $this->render('create', [
                'model' => $model,
                'typesList' => $typesList,
                'cityList' => $cityList,
                'clubsList' => $clubsList,
                'img' => $img
            ]);
        }
    }

    public function actionAjax_get_event($id)
    {
        $model = Events::find()->where(['id'=>$id])->with('city')->asArray()->one();
        return $this->renderAjax('@frontend/modules/events/widgets/views/single_event',['item'=>$model]);
    }

    public function actionCopy($id)
    {
        $model = $this->findModel($id);

        $new_model = new Events();
        $data = $model->attributes;
        $data['id'] = null;
        $new_model->attributes = $data;
        $new_model->dt_start = strtotime('+1 year',$new_model->dt_start);
        $new_model->dt_end = strtotime('+1 year',$new_model->dt_end);
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

    public function actionAjax_add_bookmark()
    {
        $id = Yii::$app->request->post('event');
        $model = new Bookmarks();
        $model->event = $id;
        $model->user = Yii::$app->getUser()->id;
        if($model->save())
        {
            return 'OK';
        }
        else
            return 'ERROR';

    }

    public function actionAjax_add_participant()
    {
        $id = Yii::$app->request->post('event');
        $model = new EventsUser();
        $model->events_id = $id;
        $model->user_id = Yii::$app->getUser()->id;
        if($model->save())
        {
            return 'OK';
        }
        else
            return 'ERROR';

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

    public function actionUpload_file()
    {

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
            ImgEvent::deleteAll(['event_id' => 99999]);
            foreach ($_FILES['file']['name'] as $file) {

                move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir . $file);
                $img = new ImgEvent();
                $img->event_id = 99999;
                $img->img = $dir . $file;

                if($img->save())
                    echo 'OK';
                else echo 'ERROR';
                $i++;
            }
        }
        echo 1;
    }
    public function actionDelete_file(){
        ImgEvent::deleteAll(['id' => $_GET['id']]);
        echo 1;
    }


    public function actionAjax_get_events()
    {
        $event = Events::find()->where(['id' => $_POST['id']])->one();
        return $this->renderPartial('ajax-event-home', ['events' => $event]);
    }


    public function actionEvent_search(){
        $idType = [];
        $dt_start = '';
        $dt_end = '';
        $city = '';

        if(!empty($_POST['type'])){
            $idType = explode(',', $_POST['type']);
            array_splice($idType, -1);
        }

        if(!empty($_POST['dt_start'])){
            $dt_start = strtotime($_POST['dt_start']);
        }
        if(!empty($_POST['dt_end'])){
            $dt_end = strtotime($_POST['dt_end']);
        }

        if(!empty($_POST['idCity'])){
            $city = $_POST['idCity'];
        }
        //Debug::prn($city);
        $events = Events::find()
            ->andWhere(['!=', 'status', 0])
            ->andWhere(['!=', 'status', 2])
            ->andFilterWhere(['type' => $idType])
            ->andFilterWhere(['>=', 'dt_start', $dt_start])
            ->andFilterWhere(['<=', 'dt_end', $dt_end])
            ->andFilterWhere(['city' => $city])
            ->orderBy('dt_start ASC')
        //Debug::prn($events->createCommand()->rawSql);
            ->all();

        //Debug::prn($events);
        return $this->renderPartial('event-search',
            [
                'events' => $events,
            ]
        );
    }

    public function actionEvent_search_month(){
//Debug::prn($_POST);
        $query = Events::find();
        if($_POST['id'] == 'all'){
            $events = $query->all();
        }else{
            $events = $query->where(['MONTH(FROM_UNIXTIME(dt_start))' => $_POST['id']])
                ->andWhere(['!=', 'status', 0])
                ->andWhere(['!=', 'status', 2])
                ->all();
        }




        return $this->renderPartial('event-search',
            [
                'events' => $events,

            ]
        );
    }

}
