<?php


namespace app\controllers;


use app\base\BaseController;
use app\models\Images;
use yii\filters\PageCache;

class StylistController extends BaseController
{

    public function behaviors()
    {
        return [

            'statistics' => [
                'class' => \Klisl\Statistics\AddStatistics::class,
                'actions' => ['portfolio'],
            ],
            ['class' => PageCache::class, 'duration' => 300]
        ];
    }

    public function actionPortfolio($id)
    {
        $model = Images::find()
            ->andWhere(['images.portfolio' => true])
            //->leftJoin('activities','images.activity_id=activities.id')
            ->joinWith('activity')
            ->andWhere(['activities.stylist_id' => $id])
            ->cache(60)
            ->all();
        return $this->render('portfolio', ['model' => $model]);
    }

}