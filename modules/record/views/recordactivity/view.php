<?php

/*
 **
 */

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $model \app\modules\record\models\RecordsActivity */
?>
<div class="modal-view">
    <h4>Здравствуйте <?=Html::encode($model->firstName)?>!</h4>
    <p>Вы записались на <?=Html::encode($model->date)?> на <?=Html::encode($model->categoryTitle)?>.</p>
    <p>Для подтверждения с Вами в ближайшее время свяжется администратор.</p>
    <p>Также Вы сами можете подтвердить бронь или узнать любую интересующую Вас информацию по телефону 888888888888</p>
</div>
