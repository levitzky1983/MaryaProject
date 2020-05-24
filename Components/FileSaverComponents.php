<?php


namespace app\Components;


use app\base\BaseComponent;
use app\models\Photo;
use app\models\Works;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\web\UploadedFile;

class FileSaverComponents extends BaseComponent
{
    public function saveFiles(UploadedFile $file)
    {
        $name = $this->genFileName($file);
        $path = $this->getPathToSave();
        $pathResize = $path . 'resize/';
        if ($file->saveAs($path . $name)) {
            $imgWidth = Image::getImagine()->open($path . $name)->getSize()->getWidth();
            $imgHeight = Image::getImagine()->open($path . $name)->getSize()->getHeight();
            //echo $imgWidth.'....'.$imgHeight; exit;
            if ($imgWidth > $imgHeight) {
                $imgResize = Image::resize($path . $name, 400, null)->save($pathResize . $name, ['quality' => 80]);
                if ($imgResize) {
                    return $name;
                }
            } else {
                $imgResize = Image::resize($path . $name, 300, null)->save($pathResize . $name, ['quality' => 80]);
                if (Image::crop($imgResize, 300, 400)->save($pathResize . $name, ['quality' => 80])) {
                    return $name;
                }
            }

        }
        /*
          if ($file->saveAs($path.$name)) {
            $imgResize = Image::resize($path.$name,$width,100)->save($pathResize.$name,['quality' => 80]);

                return $name;

        }
         */
        return null;
    }

    public function genFileName(UploadedFile $file)
    {
        return date('Y-m-d-H-i') . '-' . $file->getBaseName() . '.' . $file->getExtension();
    }

    public function getPathToSave()
    {
        $path = \Yii::getAlias('@webroot/files/image/');
        FileHelper::createDirectory($path . 'resize/');
        return $path;
    }
}