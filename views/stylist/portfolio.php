<?php



/* @var $this \yii\web\View */

use newerton\fancybox\FancyBox;
use yii\helpers\Html;

/* @var $model \app\models\Images[]|array|\yii\db\ActiveRecord[] */
?>

<? foreach ($model as $item): ?>
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
        <?= Html::a(Html::img(Yii::getAlias('@web/files/image/resize/' . $item->name), ['width' => 150]), Yii::getAlias('@web/files/image/' . $item->name), ['rel' => 'fancybox']); ?>
    </div>
<? endforeach; ?>
