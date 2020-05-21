<?php


namespace app\Components;


use app\base\BaseComponent;
use yii\rbac\ManagerInterface;

class RbacComponents extends BaseComponent
{
    private function getManager(): ManagerInterface{
        return \Yii::$app->authManager;
    }

    public function generateRbac(){
        $manager = $this->getManager();
        $manager->removeAll();

        $admin = $manager->createRole('admin');
        $manager->add($admin);

        $adminRule = $manager->createPermission('adminRole');
        $adminRule->description = 'Права администратора';
        $manager->add($adminRule);

        $manager->addChild($admin,$adminRule);

        $manager->assign($admin,1);

    }

    public function canAdminActivity():bool {
        return \Yii::$app->user->can('adminRole');
    }
}