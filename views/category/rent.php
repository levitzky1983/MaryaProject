<?php


/* @var $this \yii\web\View */

/* @var $model \yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Аренда студии';
//$this->params['description'] = 'zzzzzzzz';
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
                        'class' => 'col-sm-2',
                    ],
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(Html::img('@web/files/image/resize/' . $model->preview, ['width' => 100]), [Yii::getAlias('@web/category/rent-view/'), 'category_id' => $model->id]);
                },
            ],
            [
                'attribute' => 'title',
                'contentOptions' =>
                    [
                        'class' => 'col-sm-2',
                    ],
                'format' => 'raw',
                'label' => 'Категория',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->title), [Yii::getAlias('@web/category/rent-view/'), 'category_id' => $model->id], ['class' => 'link']);
                }
            ],
            [
                'attribute' => 'description',
                'label' => 'Описание',
                'contentOptions' =>
                    [
                        'class' => 'col-sm-4',
                    ],
            ],
            [
                'attribute' => 'timing',
                'label' => 'Описание',
                'contentOptions' =>
                    [
                        'class' => 'col-sm-2',
                    ],
            ],
            [
                'attribute' => 'price',
                'label' => 'Цена',
                'contentOptions' =>
                    [
                        'class' => 'col-sm-2',
                    ],
                'value' => function ($model) {
                    return $model->price . ' руб';
                }
            ],
        ]
])
?>
