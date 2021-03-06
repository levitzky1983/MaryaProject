<?php

use app\Components\ActivitiesComponents;
use app\Components\AuthComponents;
use app\Components\CategoryComponents;
use app\Components\FileSaverComponents;
use app\Components\imagesComponents;
use app\Components\RbacComponents;
use app\Components\StylistsComponents;
use app\modules\record\components\RecordsComponent;

$params = require __DIR__ . '/params.php';
$db = file_exists(__DIR__ . '/dblocal.php')?(require __DIR__ . '/dblocal.php'):(require __DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'ru',
    'layout' => 'main',
    'defaultRoute'=>'site/index',
    'aliases' => [
        '@admin' => '/admin',
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'defaultRoute' => 'admin/index',
            'layout' => 'main'
        ],
        'record' => [
            'class' => 'app\modules\record\Module',
            'defaultRoute' => 'recordactivity/create',
            'layout' => 'main'
        ],
    ],
    'components' => [

        'authManager' => [
                'class' => 'yii\rbac\DbManager'
        ],
        'record' => [
            'class'=>RecordsComponent::class
        ],
        'image' => [
            'class'=>imagesComponents::class
            ],
        'stylist'=> [
            'class'=>StylistsComponents::class
        ],
        'activity' => [
            'class'=>ActivitiesComponents::class
        ],
        'category' => [
           'class' =>CategoryComponents::class
        ],
        'filesaver' => [
            'class'=>FileSaverComponents::class
        ],
        'auth' => [
            'class'=>AuthComponents::class
        ],
        'rbac' => [
            'class' =>RbacComponents::class
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'l66JjzBDMz-DLlAap1zU-Cmwp47c_6ZT',
            'baseUrl' => ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'OpenMakeUpPlace@yandex.ru',
                'password' => 'Sisadmin23094',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
