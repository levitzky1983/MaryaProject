<?php


/* @var $this \yii\web\View */
/* @var $model \app\modules\record\models\RecordsActivity */
?>
<?php
/**
 * @var $model RecordsActivity
 */

/* @var $this \yii\web\View */

use app\modules\record\models\RecordsActivity;
use kartik\datetime\DateTimePicker;
use kartik\icons\Icon;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<?php $form = \yii\bootstrap\ActiveForm::begin([
    //'layout' => 'horizontal',
    'options' => [
        'class' => 'record-form'
    ],
   // 'action' => Url::to('@web/record/')

]) ?>

<?= $form->field($model, 'firstName')->textInput(['maxlength' => true, 'placeholder' => 'Введите Ваше имя...']); ?>

<?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Введите Ваш телефон...']); ?>

<?= $form->field($model, 'date')->widget(DateTimePicker::class, [
    'name' => 'date',
    'options' => [
        'placeholder' => 'Выберите предполагемую дату и время'
    ],
    'pluginOptions' => [
        'minuteStep' => 30,
        'autoclose' => true,
        'singleDatePicker' => true,
        'showDropdowns' => true,
        'minDate' => date('d.m.Y H:i', time()),
        'startDate' => date('d.m.Y H:i ', time()),
        'minView' => 0,
        'format' => 'dd.mm.yyyy H:ii',
    ]
]); ?>

<?php if(Yii::$app->requestedAction->id=='create'):?>

<?= $form->field($model, 'categoryTitle')->dropDownList($model->categoryTitleList, ['prompt' => 'Выберите услугу...',]); ?>

<?php endif;?>

<button type="submit" class="btn btn-primary bott">Записаться</button>

<?php ActiveForm::end() ?>

