<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fontawesome.min.css',
        'css/site.css',
        'css/style.css'
    ];
    public $js = [
        //'scripts/bootstrap.min.js',
        //'scripts/jquery-3.4.1.min.js',
        'scripts/fontawesome.min.js',
        'scripts/header.js'
    ];
    public $depends = [
       // 'app\assets\MyBootstrapAppSet',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
