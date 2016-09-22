<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 09.09.2016
 * Time: 10:57
 */

namespace frontend\controllers\user;


use common\classes\Debug;
use common\models\db\Bookmarks;
use common\models\db\Events;
use common\models\db\EventsUser;
use common\models\db\Garage;
use dektrium\user\models\Profile;
use frontend\models\user\UserDec;
use Yii;
use yii\filters\AccessControl;
use yii\imagine\Image;

class SettingsController extends \dektrium\user\controllers\SettingsController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['profile', 'account', 'networks', 'disconnect', 'delete', 'user_profile'],
                        'roles'   => ['@'],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['confirm'],
                        'roles'   => ['?', '@'],
                    ],
                ],
            ],
        ];
    }
    public function actionUser_profile(){
        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];

        $userInfo = UserDec::find()
            ->where(['`user`.`id`' => \Yii::$app->user->id])
            ->one();
        $userMoto = Garage::find()
            ->leftJoin('img_moto', '`img_moto`.`garage_id` = `garage`.`id`')
            ->leftJoin('car_mark', '`car_mark`.`id_car_mark` = `garage`.`mark_id`')
            ->leftJoin('car_model', '`car_model`.`id_car_model` = `garage`.`model_id`')
            ->where(['`garage`.`user_id`' => $userInfo->id])
            ->with('img_moto', 'car_mark', 'car_model')
            ->all();

        $userGoEvents = EventsUser::find()
            ->leftJoin('events', '`events`.`id` = `events_user`.`events_id`')
            ->andWhere(['`events_user`.`user_id`' => $userInfo->id])
            ->with('events')
            ->all();

        $userBookEvents = Bookmarks::find()
            ->leftJoin('events', '`events`.`id` = `bookmarks`.`event`')
            ->andWhere(['`bookmarks`.`user`' => $userInfo->id])
            ->with('events')
            ->all();


        //Debug::prn($userBookEvents);

        $eventsUser = Events::find()->where(['user_id' => $userInfo->id])->all();

        return $this->render('user_profile',
            [
                'user' => $userInfo,
                'userMoto' => $userMoto,
                'eventsUser' => $eventsUser,
                'userGoEvents' => $userGoEvents,
                'userBookEvents' => $userBookEvents
            ]);
    }

    /**
     * Shows profile settings form.
     *
     * @return string|\yii\web\Response
     */
    public function actionProfile()
    {

        $model = $this->finder->findProfileById(Yii::$app->user->identity->getId());

        if ($model == null) {
            $model = Yii::createObject(Profile::className());
            $model->link('user', Yii::$app->user->identity);
        }

        $event = $this->getProfileEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $event);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if (!file_exists('media/users/' . Yii::$app->user->id)) {
                mkdir('media/users/' . Yii::$app->user->id . '/');
            }
            $dir = 'media/users/' . Yii::$app->user->id . '/';

            $extension = strtolower(substr(strrchr($_FILES['Profile']['name']['avatar'], '.'), 1));

            Image::thumbnail($_FILES['Profile']['tmp_name']['avatar'], 160, 160, $mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND)
                ->save($dir . 'avatar.' . $extension, ['quality' => 100]);

            $model->avatar = '/' . $dir . 'avatar.' . $extension;

            $model->save();

            $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
            return $this->refresh();
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }
}