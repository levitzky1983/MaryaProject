<?php


/* @var $this \yii\web\View */

use app\models\CategoryActivities;
use app\widgets\CardCategory\CardCategoryWidget;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model  CategoryActivities */

$this->title = 'Каталог работ';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(
    ['name' => 'description', 'content' => 'Каталог работ и Категории работ стилистов']
);
?>
<div class="row">
    <? foreach ($model as $key => $item): ?>
        <?= Html::a(CardCategoryWidget::widget(['model' => $item]), [Yii::getAlias('@web/category/view/'), 'category_id' => $item->id]); ?>
    <? endforeach; ?>
</div>
