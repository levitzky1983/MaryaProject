<?php

namespace app\controllers;

use app\models\Activities;
use app\models\CategoryActivities;
use app\models\Images;
use app\models\Stylists;
use Yii;
use yii\filters\AccessControl;
use yii\filters\PageCache;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
            'statistics' => [
                'class' => \Klisl\Statistics\AddStatistics::class,
                'actions' => ['index', 'contact', 'about'],
            ],
            ['class' => PageCache::class, 'duration' => 60]
        ];
    }

    /**
     * {@inheritdoc}
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
     * @return string
     */


    public function actionIndex()
    {
        $left = CategoryActivities::find()->select('preview')->andWhere('`id` in (1,4,6)')->column();
        $center = Stylists::find()->andWhere(['id' => 1])->one();
        $center = $center->image;
        $right = Images::find()->select('images.name')
            ->leftJoin('activities', 'images.activity_id=activities.id')
            ->andWhere(['activities.title' => 'Студия'])->column();
        return $this->render('index', ['left' => $left, 'center' => $center, 'right' => $right]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

    /*public function actionMap()
    {
        $this->layout = '/mainmap.php';
        return $this->render('map');
    }*/

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $model = Stylists::find()->andWhere(['last_name' => 'Левицкая'])->one();
        return $this->render('about', ['model' => $model]);
    }
}
