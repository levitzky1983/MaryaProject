<?php


namespace app\modules\record\components;


use app\base\BaseComponent;
use app\models\CategoryActivities;
use app\models\Stylists;
use app\modules\record\models\RecordsActivity;
use phpDocumentor\Reflection\Types\Null_;
use yii\helpers\ArrayHelper;

class RecordsComponent extends BaseComponent
{
    public function getCategoryList()
    {
        $list = CategoryActivities::find()->andWhere('position <10')->orderBy('position ASC')->asArray()->all();
        //$list = array_merge(['0' => Null], ArrayHelper::map(Stylists::find()->asArray()->all(), 'id', 'last_name'));
        $list = ArrayHelper::map($list, 'id', 'title');
        //ArrayHelper::setValue($list,'0','Выберите услугу');
        //var_dump($list);exit;
        return $list;
    }

    public function createRecordActivity(RecordsActivity $model): bool
    {
        if (!$model->categoryTitle) {
            $model->categoryActivity_id = CategoryActivities::find()->select('id')->andWhere(['title'=>'Аренда'])->one();
            $model->categoryTitle = 'Аренда';
        } else {
            $model->categoryActivity_id = $model->categoryTitle;
            $model->categoryTitle = ArrayHelper::getValue($model->categoryTitleList, $model->categoryActivity_id);
        }
        if (!$model->save() || !$this->sellEmail($model)) {
            return false;
        }
        return true;
    }

    private function sellEmail(RecordsActivity $model)
    {
        $send = \Yii::$app->mailer->compose('email', ['model' => $model])
            ->setSubject('У Вас новая запись от ' . $model->firstName)
            ->setTo('OpenMakeUpPlace@yandex.ru')
            ->setFrom('OpenMakeUpPlace@yandex.ru')
            ->send();
        if ($send) {
            return true;
        }
        return false;
    }
}