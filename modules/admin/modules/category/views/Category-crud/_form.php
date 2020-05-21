<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\categoryActivities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-activities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timing')->textInput()  ?>

    <?= $form->field($model, 'addCategory')->checkbox() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div>
        <?= Html::img(Yii::getAlias('@web/files/image/resize/' . $model->preview), ['width' => 100]); ?>
    </div>

</div>
