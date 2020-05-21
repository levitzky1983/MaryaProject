<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\record\models\RecordsActivityBase */

$this->title = Yii::t('app', 'Create Records Activity Base');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Records Activity Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-activity-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
