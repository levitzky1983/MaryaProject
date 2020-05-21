<?php


namespace app\modules\record\controllers;


use app\base\BaseController;
use app\modules\record\models\RecordsActivity;
use app\modules\record\models\RecordsActivityBase;

class RecordactivityController extends BaseController
{

    public function actionCreate()
    {
        $model = new RecordsActivity(['scenario' => RecordsActivity::SCENARIO_SERVICE]);
        if ($model->load(\Yii::$app->request->post())) {
            if (\Yii::$app->record->createRecordActivity($model)) {
                return $this->render('view', ['model' => $model]);
            }
            return $this->render('warning', ['model' => $model]);
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionRent(){
        $model  = new RecordsActivity(['scenario' => RecordsActivity::SCENARIO_RENT]);
        if ($model->load(\Yii::$app->request->post())) {
            if (\Yii::$app->record->createRecordActivity($model)) {
                return $this->render('view', ['model' => $model]);
            }
            return $this->render('warning', ['model' => $model]);
        }
        return $this->render('create', ['model' => $model]);

    }
}