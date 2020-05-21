<?php


/* @var $this \yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;


$this->title = 'Услуги и цены';
//$this->params['description'] = 'aaaaaa';
?>

<?= GridView::widget([
    'dataProvider' => $model,
    'tableOptions' => [
        'class' => 'table table-striped table-bordered table-price'
    ],
    'rowOptions' => [
        'class' => ''
    ],
    'summary' => '',
    'showHeader' => false,
    'columns' =>
        [
            [
                'attribute' => 'preview',
                'label' => 'Предпросмотр',
                'contentOptions' =>
                    [
                        'class' => '',
                    ],
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(Html::img('@web/files/image/resize/' . $model->preview, ['width' => 50]), [Yii::getAlias('@web/category/view/'), 'category_id' => $model->id]);
                },
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'label' => 'Категория',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->title), [Yii::getAlias('@web/category/view/'), 'category_id' => $model->id], ['class' => 'link']);
                }
            ],
            'description',
            'timing',
            [
                'attribute' => 'price',
                'label' => 'Цена',
                'value' => function ($model) {
                    return $model->price . ' руб';
                }
            ],
        ]
])
?>

<!--
<table class="">
    <tr>
        <th colspan="10">Модель</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Итого</th>
    </tr>
    <tr>
        <td><img src="https://html5book.ru/wp-content/uploads/2015/04/dress-2.png"></td>
        <td>Платье с цветочным принтом</td>
        <td>2500</td>
        <td>1</td>
        <td>2500</td>
    </tr>
    <tr>
        <td><img src="https://html5book.ru/wp-content/uploads/2015/04/dress-3.png"></td>
        <td>Платье с боковыми вставками</td>
        <td>3000</td>
        <td>1</td>
        <td>3000</td>
    </tr>
</table>-->