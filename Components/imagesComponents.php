<?php


namespace app\Components;


use app\base\BaseComponent;
use app\models\Images;

class imagesComponents extends BaseComponent
{
    public function delete(Images $model)
    {
        if (file_exists(\Yii::getAlias('@webroot/files/image/' . $model->name))) {
            unlink(\Yii::getAlias('@webroot/files/image/' . $model->name));
        }
        if (file_exists(\Yii::getAlias('@webroot/files/image/resize' . $model->name))) {
            unlink(\Yii::getAlias('@webroot/files/image/resize' . $model->name));
        }
        if ((file_exists(\Yii::getAlias('@webroot/files/image/' . $model->name))) ||
            (file_exists(\Yii::getAlias('@webroot/files/image/resize' . $model->name)))) {
            $model->addError('delete', 'Файлы данных не удалены');
            return false;
        }
        if(!$model->delete()){
            $model->addError('delete', 'Запись не удалена');
            return false;
        }
        return true;
    }
}