<?php

namespace app\modules\admin\modules\activities\controllers;

use app\models\CategoryActivities;
use app\models\Images;
use app\models\Stylists;
use Yii;
use app\models\Activities;
use app\modules\admin\modules\activities\models\ActivitiesCrud;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivitiesCrudController implements the CRUD actions for Activities model.
 */
class ActivitiesCrudController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Activities models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivitiesCrud();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$searchModel->createDate = Yii::$app->formatter->asDate($searchModel->createDate,'php:d.m.Y');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Activities model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $images = Images::find()->select('name')->andFilterWhere(['activity_id' => $id])->column();
        return $this->render('view', [
            'model' => $model,
            'images' => $images
        ]);
    }

    /**
     * Creates a new Activities model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activities();
        $stylists = array_merge(['0' => 'Нет'], ArrayHelper::map(Stylists::find()->asArray()->all(), 'id', 'last_name'));
        $categories = ArrayHelper::map(CategoryActivities::find()->asArray()->all(), 'id', 'title');
        //var_dump($stylists);exit;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->stylistLastName == 0) {
                $model->stylist_id = null;
            } else {
                $model->stylist_id = $model->stylistLastName;
                $model->stylistLastName = ArrayHelper::getValue($stylists, $model->stylist_id);
            }
            $model->category_id = $model->categoryTitle;
            $model->categoryTitle = ArrayHelper::getValue($categories, $model->category_id);
            /*$model->stylist_id = Stylists::find()->andWhere(['last_name'=>$model->stylistLastName])->one()->id;
            $model->category_id = CategoryActivities::find()->andWhere(['title'=>$model->categoryTitle])->one()->id;*/

            if (!Yii::$app->activity->createActivity($model)) {

                return var_dump($model->getErrors());
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'stylists' => $stylists,
            'categories' => $categories
        ]);


        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/
    }

    /**
     * Updates an existing Activities model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $stylists = array_merge(['0' => 'Нет'], ArrayHelper::map(Stylists::find()->asArray()->all(), 'id', 'last_name'));
        $categories = ArrayHelper::map(CategoryActivities::find()->asArray()->all(), 'id', 'title');
        if ($model->load(Yii::$app->request->post())) {
            if ($model->stylistLastName == 0) {
                $model->stylist_id = null;
            } else {
                $model->stylist_id = $model->stylistLastName;
                $model->stylistLastName = ArrayHelper::getValue($stylists, $model->stylist_id);
            }
            $model->category_id = $model->categoryTitle;
            $model->categoryTitle = ArrayHelper::getValue($categories, $model->category_id);
            if (!Yii::$app->activity->createActivity($model)) {
                return var_dump($model->getErrors());
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'stylists' => $stylists,
            'categories' => $categories
        ]);
    }

    /**
     * Deletes an existing Activities model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (!Yii::$app->activity->deleteActivity($model)) {
            return var_dump($model->getErrors('activity'));
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Activities model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activities the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activities::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
