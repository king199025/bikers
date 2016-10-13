<?php

namespace frontend\modules\user_photo\controllers;

use common\classes\Debug;
use common\models\db\AlbumPhotoUser;
use Yii;
use frontend\modules\user_photo\models\UserPhoto;
use frontend\modules\user_photo\models\UserPhotoSearch;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * User_photoController implements the CRUD actions for UserPhoto model.
 */
class User_photoController extends Controller
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
     * Lists all UserPhoto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserPhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserPhoto model.
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
     * Creates a new UserPhoto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserPhoto();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if(!empty($_FILES['file']['name'])){
                if (!file_exists('media/users/' . Yii::$app->user->id)) {
                    mkdir('media/users/' . Yii::$app->user->id . '/');
                }
                if (!file_exists('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'))) {
                    mkdir('media/users/' . Yii::$app->user->id . '/' . date('Y-m-d'));
                }
                $dir = 'media/users/' . Yii::$app->user->id . '/' . date('Y-m-d') . '/';



                $i = 0;

                if (!empty($_FILES['file']['name'][0])) {
                    $request = Yii::$app->request->post('UserPhoto');
                    //Debug::prn($request->get(['id']));
                    foreach ($_FILES['file']['name'] as $file) {
                        Image::thumbnail($_FILES['file']['tmp_name'][$i], 1000, 1000, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                            ->save($dir . $file, ['quality' => 100]);
                        $img = new UserPhoto();
                        $img->album_id = $request['album_id'];
                        $img->img = $dir . $file;
                        $img->user_id = $request['user_id'];
                        $img->save();
                        $i++;
                    }
                }
            }


            return $this->redirect(['/user/settings/user_profile']);
        } else {
            $album = AlbumPhotoUser::find()->where(['user_id' => Yii::$app->user->id])->all();
            return $this->render('create', [
                'model' => $model,
                'album' => $album,
            ]);
        }
    }

    /**
     * Updates an existing UserPhoto model.
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
     * Deletes an existing UserPhoto model.
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
     * Finds the UserPhoto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserPhoto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserPhoto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
