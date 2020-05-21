<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'disabled'=>true]) ?>

    <?= $form->field($model, 'activity_id')->textInput(['disabled'=>true]) ?>

    <?= $form->field($model, 'portfolio')->checkbox() ?>

    <?= $form->field($model, 'createDate')->textInput(['disabled'=>true]) ?>
    <div>
        <?= Html::img(Yii::getAlias('@web/files/image/resize/'.$model->name),['width'=>100]); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
