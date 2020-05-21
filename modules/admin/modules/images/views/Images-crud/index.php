<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modules\images\models\ImagesCrud */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['@admin']];
$this->title = Yii::t('app', 'Images');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'activity_id',
            [
                'attribute' => 'portfolio',
                'label' => 'Портфолио',
                'value' => function ($model) {
                    return $model->portfolio ? 'да' : 'нет';
                }
            ],

            [
                'attribute' => 'stylist_name',
                'value' => 'stylist.last_name',
                'label' => 'Стилист'
            ],
            'createDate',
            [
                'attribute' => 'preview',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img(Yii::getAlias('@web/files/image/resize/' . $model->name), ['width' => 50]);
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>


</div>
