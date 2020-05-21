<?php
/**
 * @var $model RecordsActivity
 */

use app\modules\record\models\RecordsActivity;
use yii\helpers\Html;

?>

<div class="content-mail">
    <h4>Уважаемая Мария!</h4>
    <p>У Вас новая Запись</p>
    <p>Клиент: <?=Html::encode($model->firstName)?></p>
    <p>Телефон: <?=Html::encode($model->phone)?></p>
    <p>Услуга: <?=Html::encode($model->categoryTitle)?></p>
    <p>На дату: <?=Html::encode($model->date)?></p>
    <p>Дата заявки <?=date('d-m-Y, H:i',time())?></p>
</div>