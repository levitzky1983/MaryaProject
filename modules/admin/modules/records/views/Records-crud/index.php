<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modules\records\models\RecordsCrud */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Records Activity Bases');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['@admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-activity-base-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'УДАЛИТЬ ВСЕ ЗАПИСИ'), ['deleteall'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstName',
            'phone',
            'date',
            'categoryActivity_id',
            //'createDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
