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
    public function saveFiles(UploadedFile $file,$width,$height ){
        $name = $this->genFileName($file);
        $path = $this->getPathToSave();
        $pathResize = $path.'resize/';
        if ($file->saveAs($path.$name)) {
            $imgResize = Image::resize($path.$name,$width,1000)->save($pathResize.$name,['quality' => 80]);
            if(Image::crop($imgResize,$width,$height)->save($pathResize.$name,['quality' => 80])){
                return $name;
            }
        }
        return null;
    }

    public function genFileName(UploadedFile $file){
        return date('Y-m-d-H-i').'-'.$file->getBaseName().'.'.$file->getExtension();
    }

    public function getPathToSave(){
        $path = \Yii::getAlias('@webroot/files/image/');
        FileHelper::createDirectory($path.'resize/');
        return $path;
    }
}