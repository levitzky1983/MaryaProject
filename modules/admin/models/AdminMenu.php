<?php


namespace app\modules\admin\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;

class AdminMenu extends Model
{
    const ACTIV = 'АКТИВНОСТИ';
    const IMAGE = 'ИЗОБРАЖЕНИЯ';
    const STYLISTS = 'СТИЛИСТЫ';
    const RECORDS = 'ЗАПИСИ В СТУДИЮ';
    //const COMMENTS = 'КОММЕНТАРИИ';
    const CATEGORY = 'КАТЕГОРИИ АКТИВНОСТИ';
    const USERS = 'ПОЛЬЗОВАТЕЛИ';
    // const CATEGORY_STYLISTS = 'КАТЕГОРИИ СТИЛИСТОВ';
  //  const STAT = 'СТАТИСТИКА';

    const ADMIN_MENU = [
        self::ACTIV => '@web/admin/activities/activities-crud/',
        self::IMAGE => '@web/admin/images/images-crud/',
        self::USERS => '@web/admin/users/users-crud/',
        self::STYLISTS => '@web/admin/stylists/stylists-crud/',
        // self::COMMENTS => '@web/admin/commennt/comments-crud',
        self::RECORDS => '@web/admin/records/records-crud/',
        self::CATEGORY => '@web/admin/category/category-crud/',
      //  self::STAT => '@web/statistics/',

    ];

    const CRUD = ['Создание' => 'create', 'Работа с записями' => 'index'];


    private function getItems($url)
    {
        $items = [];
        foreach (self::CRUD as $key => $val) {
            $item = [];
            ArrayHelper::setValue($item, 'label', $key);
            ArrayHelper::setValue($item, 'url', $url . $val);
            array_push($items, $item);
        }
        return $items;
    }


    public function getMenu()
    {
        $items = [];
        foreach (self::ADMIN_MENU as $key => $val) {
            $item = [];
            if ($key === self::IMAGE || $key === self::USERS || $key === self::RECORDS) {
                ArrayHelper::setValue($item, 'label', $key);
                ArrayHelper::setValue($item, 'items', [['label' => 'Все записи', 'url' => ArrayHelper::getValue(self::ADMIN_MENU, $key)]]);
            }  else{
                ArrayHelper::setValue($item, 'label', $key);
                ArrayHelper::setValue($item, 'items', $this->getItems($val));
            }

            array_push($items, $item);
        }

        return $items;
    }
}