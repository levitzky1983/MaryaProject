<?php


namespace app\Components;


use app\base\BaseComponent;
use app\models\Users;

class AuthComponents extends  BaseComponent
{
    public function signIn(Users $model)
    {
        $model->setScenarioSignIn();
        if (!$model->validate(['userName'])) {
            $model->clearErrors();
            $model->addError('userName', 'Такого пользователя не существует');
            return false;
        }
        $user = $this->getUserByLogin($model->userName);

        if (!$this->validatePassword($model->getPassword(), $user->passwordHash)) {
            $model->addError('password', 'Неверный пароль');
            return false;
        }

        return \Yii::$app->user->login($user);
    }

    public function signUp(Users $model)
    {
        $model->setScenarioSignUp();
        if (!$model->validate(['userName'])) {
            $model->clearErrors();
            $model->addError('userName', 'Такой пользователь существует');
            return false;
        }
        if (!$model->validate(['password'])) {
            $model->clearErrors();
            $model->addError('password', 'Пароль не должен быть пустым');
            return false;
        }
        $model->passwordHash = $this->genPasswordHash($model->getPassword());
        if (!$model->save()) {
            return false;
        }
        return true;
    }


    private function getUserByLogin($login)
    {
        return Users::find()->andWhere(['userName' => $login])->one();
    }

    private function validatePassword($pass, $passHash): bool
    {
        if (\Yii::$app->security->validatePassword($pass, $passHash)) {
            return true;
        }
        return false;
    }

    private function genPasswordHash($pass)
    {
        return \Yii::$app->security->generatePasswordHash($pass, '13');
    }

}