<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryTitle')->dropDownList($categories,
        ['options' => [$model->category_id => ['selected' => true]]]) ?>

    <?= $form->field($model, 'stylistLastName')->dropDownList($stylists,
        ['options' => [$model->stylist_id => ['selected' => true]]]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?=$form->field($model, 'files[]')->fileInput(['multiple' => true,]);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
