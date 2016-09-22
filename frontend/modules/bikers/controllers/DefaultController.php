<?php

namespace frontend\modules\bikers\controllers;

use common\classes\Debug;
use common\models\db\Bookmarks;
use common\models\db\Events;
use common\models\db\Garage;
use common\models\db\Profile;
use common\models\db\Travel;
use common\models\db\TravelBookmark;
use \dektrium\user\models\User;
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
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];

        $query = User::find();

        $usersCount = $query->count();

        $users = $query
            ->limit(12)
            ->all();

        $page = 1;


        return $this->render('index',
            [
                'model' => $users,
                'usersCount' => $usersCount,
                'page' => $page,
                'limit' => 12,
            ]);


        /*$users = User::find()
            ->with('profile')
            ->limit(12)
            ->all();
        return $this->render('index',[
            'model' => $users,
        ]);*/
    }

    public function actionAjax_get_bikers(){
        $query = User::find();

        $usersCount = $query->count();

        $users = $query
            ->offset($_POST['page'] * 12)
            ->limit(3)
            ->all();

        return $this->renderPartial('ajax_bikers',
            [
                'model' => $users,
                'usersCount' => $usersCount,
                'page' => $_POST['page'],
                'limit' => 12,
            ]);
    }

    public function actionView($id)
    {
        $events = Events::find()
            ->leftJoin('`events_user`','`events_user`.`events_id` = `events`.`id`')
            ->where(['`events_user`.`user_id`' => $id])
            ->all();
        $bookmark_events = Bookmarks::find()->where(['user' => $id])->with('event0')->all();
        $travels = Travel::find()->where(['user_id'=>$id])->all();
        //Debug::prn($events);
        //die;
        $model = User::find()->where(['id'=>$id])->with('profile')->one();
        $travel_bookmarks = TravelBookmark::find()->where(['user' => $id])->with('travel0')->all();
        return $this->render('view',[
            'model' => $model,
            'events' => $events,
            'bookmarks' => $bookmark_events,
            'travels' => $travels,
            'travel_bookmarks' => $travel_bookmarks
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
