<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stylists".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $vk
 * @property string $instagram
 * @property string $phone
 * @property string $image
 * @property file
 * @property string|null $description
 * @property string|null $category_stylist
 * @property string $createDate
 *
 * @property Activities[] $activities
 */
class StylistsBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stylists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['description','vk','instagram','phone','image'], 'string'],
            [['createDate'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 150],
            [['category_stylist'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'vk' => Yii::t('app', 'VK'),
            'instagram' => Yii::t('app', 'Instagram'),
            'phone' => Yii::t('app', 'Phone'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'category_stylist' => Yii::t('app', 'Category Stylist'),
            'createDate' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[Activities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activities::className(), ['stylist_id' => 'id']);
    }
}
