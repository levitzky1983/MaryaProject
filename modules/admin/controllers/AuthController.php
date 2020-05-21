<?php


namespace app\modules\admin\controllers;


use app\base\BaseController;
use app\models\Users;
use yii\helpers\Url;

class AuthController extends BaseController
{
    public function actionSignIn(){
        $model = new Users();
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->auth->signIn($model)){
                return $this->redirect(Url::to(['admin/index']));
            }
        }
        return $this->render('signIn',['model'=>$model]);
    }

    public function actionSignUp(){
        $model = new Users();
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->auth->signUp($model)){
                return $this->render('signIn',['model'=>$model]);
            }
        }
        return $this->render('signUp',['model'=>$model]);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        //echo \Yii::$app->getHomeUrl() ;exit;
        return $this->redirect(\Yii::$app->getHomeUrl());
    }
}