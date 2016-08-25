<?php

namespace frontend\modules\bikers\controllers;

use common\models\db\Garage;
use common\models\db\Profile;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `bikers` module
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
    public function actionView($id)
    {
        $profile = Profile::findOne(['user_id' => $id]);
        return $this->render('view',[
            'model' => $this->findModel($id),
            'profile' => $profile,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
