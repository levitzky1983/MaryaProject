<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\categoryActivities */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['@admin']];
$this->title = Yii::t('app', 'Create Category Activities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-activities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
