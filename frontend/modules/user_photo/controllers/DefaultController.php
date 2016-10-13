<?php

namespace frontend\modules\user_photo\controllers;

use yii\web\Controller;

/**
 * Default controller for the `user_photo` module
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
}
