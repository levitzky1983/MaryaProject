<?php

namespace app\modules\admin;

/**
 * Admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->modules = [
            'activities' => [
                'class' => 'app\modules\admin\modules\activities\Module',
                'defaultRoute' => '/activities-crud/index'
            ],
            'images' => [
                'class' => 'app\modules\admin\modules\images\Module',
                'defaultRoute' => '/images-crud/index'
            ],
            'stylists' => [
                'class' => 'app\modules\admin\modules\stylists\Module',
                'defaultRoute' => '/stylists-crud/index'
            ],
            'users' => [
                'class' => 'app\modules\admin\modules\users\Module',
                'defaultRoute' => '/users-crud/index'
            ],
            'category' => [
                'class' => 'app\modules\admin\modules\category\Module',
                'defaultRoute' => '/category-crud/index'
            ],
            'records' => [
                'class' => 'app\modules\admin\modules\records\Module',
                'defaultRoute' => '/records-crud/index'
            ],

        ];

        // custom initialization code goes here
    }
}
