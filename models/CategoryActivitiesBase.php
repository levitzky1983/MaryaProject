<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_activities".
 *
 * @property int $id
 * @property int|null $position
 * @property string $title
 * @property string|null $description
 * @property string|null $preview
 * @property int|null $price
 * @property boolean $addCategory
 * @property string|null $timing
 * @property Activities[] $activities
 */
class CategoryActivitiesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description','timing'], 'string'],
            [['price','position'], 'integer'],
            ['addCategory','boolean'],
            [['title','preview'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'position'=>Yii::t('app', 'Position'),
            'title' => Yii::t('app', 'Title'),
            'timing' => Yii::t('app', 'Timing'),
            'description' => Yii::t('app', 'Description'),
            'addCategory' => Yii::t('app', 'ADD'),
            'price' => Yii::t('app', 'Price'),
            'preview' => Yii::t('app', 'Preview'),

        ];
    }

    /**
     * Gets query for [[Activities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activities::className(), ['category_id' => 'id']);
    }
}
