<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stylists */

$this->title = Yii::t('app', 'Create Stylists');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['@admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stylists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stylists-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
