<?php


namespace app\widgets\CardCategory;


use yii\base\Widget;

class CardCategoryWidget extends Widget
{
    public $model;
    public  function run()
    {
       return $this->render('card',['model'=>$this->model]);
    }
}