<?php

use app\models\CategoryActivities;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modules\activities\models\ActivitiesCrud */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Activities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['@admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activities-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Activities'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'category_id',
            [
                'attribute' => 'category_title',
                'value' => 'category.title'
            ],
            'stylist_id',
            [
                'attribute' => 'stylist_name',
                'value' => 'stylist.last_name'
            ],
            // 'description:ntext',
            //'createDate',
            [
                'attribute' => 'createDate',
                'label' => 'Дата создания',
               /* 'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->createDate, 'php:d.m.Y');
                },*/
                //'format' => ['date', 'php:d.m.Y']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
