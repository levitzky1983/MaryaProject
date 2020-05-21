<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\Components\FileSaverComponents;
use app\widgets\Alert;
use conquer\modal\ModalForm;
use kartik\icons\Icon;
use yii\debug\widgets\NavigationButton;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

<body>

<?php $this->beginBody() ?>
<div class="wrap">

    <header class="header">
        <div class="topheader row">
            <div class=" col-xs-12 col-sm-6 col-md-4 flex-column">
                <p>Тел. 8-961-009-26-15</p>
                <p>WhatsApp/Viber</p>
                <div class="social flex-row">
                <span>
                    <?= Html::a(Icon::show('vk', ['class' => 'fa-2x', 'framework' => Icon::FAB]), 'https://vk.com/openmakeupplace', ['target' => '_blank']) ?>
                    <p class="hint">Вконтакте</p>
                </span>
                    <span>
                    <?= Html::a(Icon::show('instagram', ['class' => 'fa-2x', 'framework' => Icon::FAB]), 'https://instagram.com/openmakeupplace', ['target' => '_blank']) ?>
                    <p class="hint">Instagram</p>
                </span>
                    <span>
                    <?= Html::a(Icon::show('whatsapp', ['class' => 'fa-2x', 'framework' => Icon::FAB]), 'https://wa.me/79610092615', ['target' => '_blank']) ?>
                    <p class="hint">WhatsApp</p>
                </span>
                    <span>
                    <?= Html::a(Icon::show('viber', ['class' => 'fa-2x', 'framework' => Icon::FAB]), 'https://viber.click/79610092615', ['target' => '_blank']) ?>
                    <p class="hint">Viber</p>
                </span>
                </div>
            </div>


            <div class=" col-xs-12 col-sm-6 col-md-4 flex-row logo">
                <?php if (Yii::$app->requestedAction->uniqueId == 'site/index'): ?>
                    <?= Html::img('@web/files/icon/logo.jpg', ['width' => 150, 'class' => 'logo-img1']); ?>
                <?php else: ?>
                    <?= Html::img('@web/files/icon/logo.jpg', ['width' => 150, 'class' => 'logo-img']); ?>
                <?php endif; ?>
            </div>

            <div class=" col-xs-12 col-sm-6 col-md-4 flex-column">
                <p>Адрес: г.Рязань, ул. Урицкого д.35.</p>
                <p>Режим работы: </p>
                <p>круглосуточно (по записи)</p>
                <p>Предварительная запись</p>
                <div>
                    <?= Html::a('ЗАПИСАТЬСЯ', Url::to('/record/'), ['class' => "bott", 'id' => 'modal-record']) ?>
                </div>
                <div>
                    <?= Html::a('АРЕНДА', Url::to('/record/recordactivity/rent/'), ['class' => "bott", 'id ' => 'modal-record']) ?>
                </div>
                <?php ModalForm::widget([
                    'selector' => ('#modal-record'),
                ]) ?>
            </div>

        </div>
        <div id="topmenu" class="topmenu">
            <nav class="navbar navbar-default fixed-box-my" role="navigation">
                <div class="container-fluid fixed-div-my">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav center">
                            <li><a href=<?= Url::to('@web/site/index') ?>>Главная</a></li>
                            <li><a href=<?= Url::to('@web/category/index') ?>>Каталог работ</a></li>
                            <li><a href=<?= Url::to('@web/category/price') ?>>Услуги и цены</a></li>
                            <li><a href=<?= Url::to('@web/category/rent') ?>>Аренда студии</a></li>
                            <li><a href=<?= Url::to('@web/site/about') ?>>Обо мне</a></li>
                            <li><a href=<?= Url::to('@web/site/contact') ?>>Контакты</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </header>

    <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<footer class="footer">
    <p class="">Наши партнеры</p>
    <div class="our-partners">
        <div class="partner">
            <div class="partner-logo-1"></div>
        </div>
        <div class="partner">
            <div class="partner-logo-2"></div>
        </div>
        <div class="partner">
            <div class="partner-logo-3"></div>
        </div>
    </div>
    <div class="develop">
        <p>developed by <?= Html::a('Levitzky', 'https://viber.click/79605680700', ['class' => 'link']) ?>  on  Yii2</p>
    </div>
</footer>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
