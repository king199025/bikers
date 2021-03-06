<?php
namespace frontend\controllers;

use common\classes\Debug;

use common\models\db\Events;
use common\models\db\MotoClubs;
use common\models\db\News;
use common\models\db\Travel;
use common\models\db\UserPost;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    //Общий поиск
    public function actionSearch_all(){
        $request = Yii::$app->request;
        $events = Events::find()
            ->leftJoin('City', '`City`.`id` = `events`.`city`')
            ->where(['`events`.`status`' => 1])
            ->andFilterWhere(['LIKE', '`events`.`name`', $request->post('search_events')])
            ->orFilterWhere(['LIKE', '`City`.`Name`', $request->post('search_events')])
            ->all();

        $travel = Travel::find()->where(['status' => 1])
            ->andWhere(['LIKE', 'name', $request->post('search-all')])
            ->all();
        $news = News::find()
            ->where(['LIKE', 'name', $request->post('search-all')])
            ->orWhere(['LIKE', 'text', $request->post('search-all')])
            ->all();

        $motoclubs = MotoClubs::find()
            ->where(['LIKE', 'name_rus', $request->post('search-all')])
            ->orWhere(['LIKE', 'name_en', $request->post('search-all')])
            ->orWhere(['LIKE', 'description', $request->post('search-all')])
            ->all();

        $userPosts = UserPost::find()
            ->where(['LIKE', 'title', $request->post('search-all')])
            ->orWhere(['LIKE', 'content', $request->post('search-all')])
            ->all();

        return $this->render('search_all',
            [
                'events' => $events,
                'travel' => $travel,
                'news' => $news,
                'post' => $userPosts,
                'motoclubs' => $motoclubs,
            ]
        );
        //Debug::prn($travel);
    }

    //поиск по мотокалендарю
    public function actionSearch_events(){
        $request = Yii::$app->request;
        $events = Events::find()
            ->leftJoin('City', '`City`.`id` = `events`.`city`')
            ->where(['`events`.`status`' => 1])
            ->andFilterWhere(['LIKE', '`events`.`name`', $request->post('search_events')])
            ->orFilterWhere(['LIKE', '`City`.`Name`', $request->post('search_events')])
            ->all();


        Debug::prn($events);
    }
}
