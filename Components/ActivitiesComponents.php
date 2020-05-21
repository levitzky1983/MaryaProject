<?php


namespace app\Components;


use app\base\BaseComponent;
use app\models\Activities;
use app\models\CategoryActivities;
use app\models\Images;
use yii\db\Exception;
use yii\web\UploadedFile;

class ActivitiesComponents extends BaseComponent
{
    public function createActivity(Activities $activity)
    {
        $activity->files = UploadedFile::getInstances($activity, 'files');
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $activity->save();
            if ($activity->files) {
                if (!$this->uploadFilesActivity($activity)) {
                    $transaction->rollBack();
                    return false;
                }
            }
            $transaction->commit();
            return true;

        } catch (Exception $exception) {
            $transaction->rollBack();
            echo $exception;
            exit;
            //$activity->addError($exception);
            return false;
        } catch (\Throwable $exception) {
            $transaction->rollBack();
            echo $exception;
            exit;
            //$activity->addError($exception);
            return false;
        }
    }

    private function uploadFilesActivity(Activities $activity)
    {
        foreach ($activity->files as $item) {
            $image = new Images();
            $image->activity_id = $activity->id;
            //$category = CategoryActivities::find()->andWhere(['id'=>$activity->category_id])->one()->title;
            $image->name = \Yii::$app->filesaver->saveFiles($item, 300, 400);
            if (!$image->name) {
                $image->addError('name', 'Ошибка сохранения файла');
                return false;
            }
            if (!$image->save()) {
                return false;
            }
        }
        return true;
    }

    public function deleteActivity(Activities $activity)
    {
        $transaction = \Yii::$app->db->beginTransaction();
        $images = Images::find()->andWhere(['activity_id' => $activity->id])->all();
        if ($images) {
            foreach ($images as $image) {
                if (file_exists(\Yii::getAlias('@webroot/files/image/' . $image->name))) {
                    unlink(\Yii::getAlias('@webroot/files/image/' . $image->name));
                }
                if (file_exists(\Yii::getAlias('@webroot/files/image/resize' . $image->name))) {
                    unlink(\Yii::getAlias('@webroot/files/image/resize' . $image->name));
                }
                if (!$image->delete()) {
                    $transaction->rollBack();
                    $activity->addError('activity', 'Удаление файлов не удалось. Операция отменена.');
                    return false;
                }
            }
        }

        if (!$activity->delete()) {
            $transaction->rollBack();
            $activity->addError('activity', 'Удаление активности не удалось. Операция отменена.');
            return false;
        }
        $transaction->commit();
        return true;
    }
}