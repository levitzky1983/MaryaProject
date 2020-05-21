<?php



/* @var $this \yii\web\View */

use app\models\CategoryActivities;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model CategoryActivities  */
?>

<div class="cards-list col-sm-6 col-md-4">
    <div class="card">
        <div class="card__image-container">
            <?=Html::img(Url::to('@web/files/image/resize/' . $model->preview), ['width' => 300]); ?>
        </div>

        <svg class="card__svg" viewBox="0 0 800 500">

            <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500"
                  stroke="transparent" fill="#a71d2a"/>
            <path class="card__line"
                  d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400"
                  stroke="pink" stroke-width="5" fill="transparent"/>
        </svg>

        <div class="card__content">
            <h4 class="card__title"><?= $model->title ?></h4>
            <h3>от <?= $model->price ?> руб</h3>
        </div>
    </div>
</div>