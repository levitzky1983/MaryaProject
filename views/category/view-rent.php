<?php


/* @var $this \yii\web\View */
/* @var $model \app\models\CategoryActivities|null */

/**
 * @var $image Images
 */

use app\models\Images;
use newerton\fancybox\FancyBox;
use yii\helpers\Html; ?>

<div class="flex-column text-center category-rent-view">
    <h3><?= Html::encode($model->title) ?></h3>
    <p class="col-md-8"><?=Html::encode($model->description)?></p>
</div>



<? foreach ($images as $image): ?>
    <div class="col-md-4 col-xs-6 category-view-item">
        <?= FancyBox::widget([
            'target' => 'a[rel=fancybox]',
            'helpers' => true,
            'mouse' => true,
            'config' => [
                'maxWidth' => '90%',
                'maxHeight' => '90%',
                'playSpeed' => 7000,
                'padding' => 0,
                'fitToView' => false,
                'width' => '70%',
                'height' => '70%',
                'autoSize' => true,
                'closeClick' => true,
                'openEffect' => 'elastic',
                'closeEffect' => 'elastic',
                'prevEffect' => 'elastic',
                'nextEffect' => 'elastic',
                'closeBtn' => true,
                'openOpacity' => true,
                /*'helpers' => [
                    'title' => ['type' => 'float'],
                    'buttons' => [],
                    'thumbs' => ['width' => 68, 'height' => 50],
                    'overlay' => [
                        'css' => [
                            'background' => 'rgba(0, 0, 0, 0.3)'
                        ]
                    ]
                ],*/
            ]
        ]) ?>
        <?= Html::a(Html::img(Yii::getAlias('@web/files/image/resize/' . $image->name), ['width' => 150]), Yii::getAlias('@web/files/image/' . $image->name), ['rel' => 'fancybox']); ?>
    </div>
<? endforeach; ?>