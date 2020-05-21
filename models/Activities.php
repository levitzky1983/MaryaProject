<?php


namespace app\models;


class Activities extends ActivitiesBase
{
    public $categoryTitle;
    public $stylistLastName;
    public $files;
    public $images;


    public function rules()
    {
        return (array_merge([
            [['stylistLastName','categoryTitle'],'string','max' => 50],
            ['files', 'file', 'extensions' => ['jpg', 'png'], 'maxFiles' => 10],

        ],parent::rules()));
    }

}