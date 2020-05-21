<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modules\users\models\UsersCrud */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['@admin']];
$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Users'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userName',
            [
                'attribute' => 'role',
                'value' => function ($user) {
                    if (!empty($userRole = $user->getRoles()[0])) {
                        return $userRole;
                    }
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                //'header' => 'Действия',
                'headerOptions' => ['width' => '40'],
                'template' => '{view}{delete}{link}',
            ],
            // 'passwordHash',
            //'authKey',
            //'token',
            //'createDate',

        ],
    ]); ?>


</div>
