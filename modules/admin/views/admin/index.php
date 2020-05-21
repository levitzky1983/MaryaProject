<?php

use app\modules\admin\models\AdminMenu;
use kartik\sidenav\SideNav;

/**
 * @var $model AdminMenu
 */
/* @var $this \yii\web\View */

$this->title = 'Админка';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-default-index">
    <?php echo

    SideNav::widget([
        'type' => SideNav::TYPE_INFO,
        'heading' => 'Разделы',
        //'route' =>
        'items' => $model->getMenu()
    ]);

    ?>

</div>
