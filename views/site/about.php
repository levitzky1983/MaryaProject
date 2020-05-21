<?php

/* @var $this yii\web\View */

/**
 * @var $model Stylists
 */

use app\models\Stylists;
use kartik\icons\Icon;
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stylist-preview">
    <div class="stylist-image-area col-sm-4">
        <div class="stylist-img-wrapper">
            <?= \yii\helpers\Html::a(\yii\helpers\Html::img(\yii\helpers\Url::to('@web/files/image/resize/' . $model->image)/*::getAlias('@web/files/image/preview/'.$item->preview)*/, ['width' => 300]), ['/stylist/portfolio/', 'id' => $model->id]); ?>
            <h2><?= $model->last_name . ' ' . $model->first_name ?></h2>
            <ul>
                <li><?= Html::a(Icon::show('vk', ['class' => 'fa-2x', 'framework' => Icon::FAB]), 'https://vk.com/' . $model->vk, ['target' => '_blank']) ?></li>
                <li><?= Html::a(Icon::show('instagram', ['class' => 'fa-2x', 'framework' => Icon::FAB]), 'https://instagram.com/' . $model->instagram, ['target' => '_blank']) ?></li>
            </ul>
        </div>
        <p class="stylist-more">
            <?= Html::a('Портфолио', ['/stylist/portfolio/', 'id' => $model->id], ['class' => 'btn btn-primary', 'role' => 'button']) ?>
        </p>

    </div>
    <div class="stylist-description col-xs-12 col-sm-4"><?= Html::encode($model->description) ?></div>

</div>