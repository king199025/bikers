<?php

namespace frontend\modules\moto_clubs\controllers;

use common\classes\Debug;
use common\models\db\City;
use common\models\db\Events;
use common\models\db\MotoClubsImg;
use common\models\db\MotoClubsPersonal;
use common\models\db\MotoClubsType;
use dektrium\user\models\User;
use dosamigos\transliterator\TransliteratorHelper;
use Yii;
use frontend\modules\moto_clubs\models\MotoClubs;
use frontend\modules\moto_clubs\models\MotoClubsSearch;
use yii\helpers\Inflector;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Moto_clubsController implements the CRUD actions for MotoClubs model.
 */
class Moto_clubsController extends Controller
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
     * Lists all MotoClubs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MotoClubsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = MotoClubs::find()->where(['status' => 1])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single MotoClubs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $queri = MotoClubsImg::find()->where(['moto_club_id' => $id]);
        $img = $queri->limit(7)->all();
        $imgCount = $queri->count();
        $personal = MotoClubsPersonal::find()
            ->leftJoin('user', '`user`.`id` = `moto_clubs_personal`.`user_id`')
            ->leftJoin('profile', '`profile`.`user_id` = `moto_clubs_personal`.`user_id`')
            ->where(['`moto_clubs_personal`.`club_id`' => $id])
            ->with('user', 'profile')
            ->all();

        $events = Events::find()
            ->leftJoin('event_organizers', '`event_organizers`.`event_id` = `events`.`id`')
            ->where(['`event_organizers`.`club_id`' => $id])
            ->all();


        //Debug::prn($events);
         return $this->render('view', [
            'model' => $this->findModel($id),
            'img' => $img,
            'imgCount' => $imgCount,
             'personal' => $personal,
             'events' => $events,
        ]);
    }

    public function actionAll_photo($id){
        $img = MotoClubsImg::find()->where(['moto_club_id' => $id])->all();
        return $this->render('photo',
            [
                'img' => $img,
                'model' => $this->findModel($id),
            ]
        );
    }
    /**
     * Creates a new MotoClubs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MotoClubs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new MotoClubs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionApplication()
    {
        $model = new MotoClubs();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $request = Yii::$app->request->post('MotoClubs');
            $model->dt_start = strtotime($request['dt_start']);
            if(isset($_FILES['MotoClubs']['name'])){
                if (!file_exists('media/users/' . Yii::$app->user->id)) {
                    mkdir('media/users/' . Yii::$app->user->id . '/');
                }
                if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
                    mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
                }
                $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';

                $extension = strtolower(substr(strrchr($_FILES['Events']['name']['logo'], '.'), 1));

                Image::thumbnail($_FILES['MotoClubs']['tmp_name']['logo'], 600, 800, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($dir . $_FILES['MotoClubs']['name']['logo'], ['quality' => 100]);

                $model->logo = '/' . $dir . $_FILES['MotoClubs']['name']['logo'];
            }
            $model->slug = Inflector::slug( TransliteratorHelper::process( $model->name_rus ), '-', true );
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $type = MotoClubsType::find()->all();
            $cityList = City::find()->select(['name as label','id as value'])
                ->asArray()
                ->all();
            return $this->render('application', [
                'model' => $model,
                'type' => $type,
                'cityList' => $cityList,
            ]);
        }
    }

    /**
     * Updates an existing MotoClubs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $request = Yii::$app->request->post('MotoClubs');

            //Debug::prn($_FILES);
            $model->dt_start = strtotime($request['dt_start']);
            if(!empty($_FILES['MotoClubs']['name']['logo'])){
                if (!file_exists('media/users/' . Yii::$app->user->id)) {
                    mkdir('media/users/' . Yii::$app->user->id . '/');
                }
                if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
                    mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
                }
                $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';

                $extension = strtolower(substr(strrchr($_FILES['Events']['name']['logo'], '.'), 1));

                Image::thumbnail($_FILES['MotoClubs']['tmp_name']['logo'], 600, 800, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($dir . $_FILES['MotoClubs']['name']['logo'], ['quality' => 100]);

                $model->logo = '/' . $dir . $_FILES['MotoClubs']['name']['logo'];
            }
            $model->save();


            if(!empty($_POST['moto_club_personal'])){
                MotoClubsPersonal::deleteAll(['club_id' => $model->id]);
                foreach ($_POST['moto_club_personal'] as $item) {
                    $personal = new MotoClubsPersonal();
                    $personal->club_id = $model->id;
                    $personal->user_id = $item['user_id_club'];
                    $personal->position = $item['user_position'];
                    $personal->link_vk = $item['user_link_vk'];
                    $personal->phone = $item['user_phone'];
                    $personal->save();

                }
            }

            //Debug::prn($_POST);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $type = MotoClubsType::find()->all();
            $cityList = City::find()->select(['name as label','id as value'])
                ->asArray()
                ->all();

            $user = User::find()->select(['username as label', 'id as value'])->where('username' != 'admin')->asArray()->all();

            $img = MotoClubsImg::find()->where(['moto_club_id' => $id])->all();
            return $this->render('update', [
                'model' => $model,
                'type' => $type,
                'cityList' => $cityList,
                'img' => $img,
                'user' => $user,
            ]);
        }
    }

    /**
     * Deletes an existing MotoClubs model.
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
     * Finds the MotoClubs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MotoClubs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MotoClubs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionUpload_file()
    {
        if (!file_exists('media/users/' . Yii::$app->user->id)) {
            mkdir('media/users/' . Yii::$app->user->id . '/');
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
        }
        if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb')) {
            mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/thumb') ;
        }



        $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';
        $dirThumb = $dir . 'thumb/';
        $i = 0;
        $i = 0;

        if (!empty($_FILES['file']['name'][0])) {
            $request = Yii::$app->request;
            //Debug::prn($request->get(['id']));
            foreach ($_FILES['file']['name'] as $file) {
                Image::thumbnail($_FILES['file']['tmp_name'][$i], 1000, 1000, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($dir . $file, ['quality' => 100]);
                $img = new MotoClubsImg();
                $img->moto_club_id = $request->get('id');
                $img->img = $dir . $file;

                $img->save();
                $i++;
            }
        }

        //Debug::prn(1);

        echo 1;
    }

    public function actionAjax_add_personal(){
        $user = User::find()->select(['username as label', 'id as value'])->where('username' != 'admin')->asArray()->all();
        return $this->renderAjax('add-personal',
            [
                'user' => $user,
                'count' => $_POST['count']+1,
            ]);
    }
}
