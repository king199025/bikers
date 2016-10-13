<?php

namespace frontend\modules\moto_clubs\controllers;

use yii\web\Controller;

/**
 * Default controller for the `moto_clubs` module
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
