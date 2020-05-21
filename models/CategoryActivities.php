<?php


namespace app\models;


class CategoryActivities extends CategoryActivitiesBase
{
    public $file;
    public function rules()
    {
        return array_merge([
            ['file','file','maxSize' => 10000000]
        ],parent::rules());
    }
}