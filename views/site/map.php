<?php



/* @var $this \yii\web\View */

use yii\helpers\Html;

?>
<div style="margin-top: 50px">
    <?php
    $url = "https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7df1476121d80516fffa2ef87987c3be1b157695862148a5d64733deb58ea3d4&amp;width=100%25&amp;height=600&amp;lang=ru_RU&amp;scroll=true";
    echo Html::jsFile($url);
    ?>
</div>
