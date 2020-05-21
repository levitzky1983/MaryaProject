<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use conquer\modal\ModalForm;
use newerton\fancybox\FancyBox;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact flex-column">
    <div></div>
    <div class="map">
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
        <?= Html::a(Html::img(Yii::getAlias('@web/files/icon/map.jpg'), ['width' => 300,'class'=>'map-img']), Yii::getAlias('@web/files/icon/map.jpg'), ['rel' => 'fancybox']); ?>
    </div>

    <div>
        <?= Html::a('Открыть карту', 'https://yandex.ru/maps/?um=constructor%3A7df1476121d80516fffa2ef87987c3be1b157695862148a5d64733deb58ea3d4&source=constructorLink', ['class' => "bott", 'target' => '_blank']) ?>
    </div>
</div>

