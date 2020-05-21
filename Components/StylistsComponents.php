<?php

namespace app\Components;


use app\base\BaseComponent;
use app\models\Activities;
use app\models\Images;
use app\models\Stylist;
use app\models\Stylists;
use yii\db\Exception;
use yii\web\UploadedFile;

class StylistsComponents extends BaseComponent
{
    public function createStylist(Stylists $stylist)
    {
        $stylist->file = UploadedFile::getInstances($stylist, 'file');
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            if ($stylist->file) {
                if (!$this->uploadFilesStylist($stylist)) {
                    $transaction->rollBack();
                    return false;
                }
            }
            if ($stylist->save()) {
                $transaction->commit();
                return true;
            };
            $transaction->rollBack();
            return false;
        } catch (Exception $exception) {
            $transaction->rollBack();
            echo $exception;
            exit;
            return false;
        } catch (\Throwable $exception) {
            $transaction->rollBack();
            echo $exception;
            exit;
            return false;
        }
    }

    private function uploadFilesStylist(Stylists $stylist)
    {
        $stylist->image = \Yii::$app->filesaver->saveFiles($stylist->file, 300, 400);
        if (!$stylist->image) {
            $stylist->addError('name', 'Ошибка сохранения файла');
            return false;
        }
        return true;
    }

    public function deleteStylist(Stylists $stylist)
    {
        if ($stylist->image) {
            if (!$this->deleteStylistImage($stylist->image)) {
                $stylist->addError('delete', 'Ошибка удаления данных');
                return false;
            }
        }
        if (!$stylist->delete()) {
            $stylist->addError('delete', 'Удаление не удалось.');
            return false;
        }
        return true;
    }

    public function deleteStylistImage($image)
    {
        if ($image) {
            if (file_exists(\Yii::getAlias('@webroot/files/image/' . $image))) {
                unlink(\Yii::getAlias('@webroot/files/image/' . $image));
            }
            if (file_exists(\Yii::getAlias('@webroot/files/image/resize/' . $image))) {
                unlink(\Yii::getAlias('@webroot/files/image/resize/' . $image));
            }
            if (file_exists(\Yii::getAlias('@webroot/files/image/stylist/' . $image)) &&
                file_exists(\Yii::getAlias('@webroot/files/image/stylist/resize/' . $image))) {
                return false;
            }
        }
        return true;
    }


    public function updateStylist(Stylists $stylist)
    {
        $stylist->file = UploadedFile::getInstance($stylist, 'file');
        if ($stylist->file) {
            if ($this->deleteStylistImage($stylist->image)) {
                if (!$this->uploadFilesStylist($stylist)) {
                    return false;
                }
                $stylist->file='';
            }
        }
        if ($stylist->save()) {
            return true;
        }
        return false;
    }
}