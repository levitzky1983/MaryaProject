<?php

/* @var $this yii\web\View */

/*
 * @var $left
 * @var $center Stylists
 * @var $right Activities
 */

use app\models\CategoryActivities;
use app\models\CategoryWork;
use app\models\Stylists;use yii\helpers\Html;

$this->title = 'Open Make Up Place';
?>
<div class="site-index">
    <div class="index-left">
        <div class="image rotate30"><?=Html::img(Yii::getAlias('@web/files/image/resize/'.$left[0]),['width'=>200])?></div>
        <div class="image "><?=Html::img(Yii::getAlias('@web/files/image/resize/'.$left[1]),['width'=>200])?></div>
        <div class="image rotate_30"><?=Html::img(Yii::getAlias('@web/files/image/resize/'.$left[2]),['width'=>200])?></div>
    </div>
    <div class="index-center"><?=Html::img(Yii::getAlias('@web/files/image/'.$center),['width'=>200])?></div>
    <div class="index-right">
        <div class="image rotate_30"><?=Html::img(Yii::getAlias('@web/files/image/resize/'.$right[0]),['width'=>200])?></div>
        <div class="image"><?=Html::img(Yii::getAlias('@web/files/image/resize/'.$right[1]),['width'=>200])?></div>
        <div class="image rotate30"><?=Html::img(Yii::getAlias('@web/files/image/resize/'.$right[2]),['width'=>200])?></div>
    </div>
</div>
