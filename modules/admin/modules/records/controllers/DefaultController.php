<?php

namespace app\modules\admin\modules\records\controllers;

use yii\web\Controller;

/**
 * Default controller for the `records` module
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
