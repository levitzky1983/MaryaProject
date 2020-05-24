<?php


namespace app\Components;


use app\base\BaseComponent;
use app\models\Activities;
use app\models\CategoryActivities;
use app\models\Stylists;
use yii\db\Exception;
use yii\web\UploadedFile;

class CategoryComponents extends BaseComponent
{
    public function createCategory(CategoryActivities $category)
    {
        $category->file = UploadedFile::getInstance($category, 'file');
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            if ($category->file) {
                $category->preview = \Yii::$app->filesaver->saveFiles($category->file);
                $category->file = '';
                if (!$category->preview) {
                    $category->addError('create', 'Ошибка сохранения файла');
                    $transaction->rollBack();
                    return false;
                }
            }
            if (!$category->save()) {
                $transaction->rollBack();
                $category->addError('create', 'Ошибка сохранения записи');
                return false;
            }
            $transaction->commit();
            return true;

        } catch
        (Exception $exception) {
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

    public function deleteCategory(CategoryActivities $category)
    {
        if ($category->preview) {
            if (!$this->deleteCategoryPreview($category->preview)) {
                $category->addError('delete', 'Ошибка удаления данных');
                return false;
            }
        }
        if (!$category->delete()) {
            $category->addError('delete', 'Удаление не удалось.');
            return false;
        }
        return true;
    }

    public function deleteCategoryPreview($preview)
    {
        if ($preview) {
            if (file_exists(\Yii::getAlias('@webroot/files/image/' . $preview))) {
                unlink(\Yii::getAlias('@webroot/files/image/' . $preview));
            }
            if (file_exists(\Yii::getAlias('@webroot/files/image/resize/' . $preview))) {
                unlink(\Yii::getAlias('@webroot/files/image/resize/' . $preview));
            }
            if (file_exists(\Yii::getAlias('@webroot/files/image/stylist/' . $preview)) &&
                file_exists(\Yii::getAlias('@webroot/files/image/stylist/resize/' . $preview))) {
                return false;
            }
        }
        return true;
    }


    public function updateCategory(CategoryActivities $category)
    {
        $category->file = UploadedFile::getInstance($category, 'file');
        if ($category->file) {
            if ($this->deleteCategoryPreview($category->preview)) {
                $category->preview = '';
                $category->preview = \Yii::$app->filesaver->saveFiles($category->file, 300, 400);
                if (!$category->preview) {
                    $category->addError('update', 'Ошибка сохранения записи');
                    return false;
                }
                $category->file = '';
            }
        }
        if ($category->save()) {
            return true;
        }
        $category->addError('update', 'Ошибка сохранения записи');
        return false;
    }
}