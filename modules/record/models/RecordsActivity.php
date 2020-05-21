<?php


namespace app\modules\record\models;


class RecordsActivity extends RecordsActivityBase
{
    public $categoryTitle;

    public $categoryTitleList;

    public function init()
    {
        $this->categoryTitleList = \Yii::$app->record->getCategoryList();
        parent::init(); // TODO: Change the autogenerated stub
    }

    const SCENARIO_SERVICE = 'service';
    const SCENARIO_RENT = 'rent';

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[static::SCENARIO_SERVICE] = ['firstName', 'phone', 'date','categoryActivity_id','categoryTitle'];
        $scenarios[static::SCENARIO_RENT] = ['firstName', 'phone', 'date'];
        return $scenarios;
    }

    public function rules()
    {
        return array_merge([
            ['categoryTitle', 'string'],
            ['categoryTitle', 'required'],
            ['phone','match','pattern' => '/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/']
        ],parent::rules());
    }




    public function attributeLabels()
    {

        return array_merge([
            'categoryTitle'=>'Услуга'
        ],parent::attributeLabels()); // TODO: Change the autogenerated stub
    }
}