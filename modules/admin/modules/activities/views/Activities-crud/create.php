<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activities */

$this->title = Yii::t('app', 'Create Activities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['@admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'stylists' => $stylists,
        'categories' => $categories
    ]) ?>

</div>
