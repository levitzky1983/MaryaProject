<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $id
 * @property string|null $title
 * @property int $category_id
 * @property int|null $stylist_id
 * @property string|null $description
 * @property string $createDate
 *
 * @property CategoryActivities $category
 * @property Stylists $stylist
 * @property Images[] $images
 */
class ActivitiesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'stylist_id'], 'integer'],
            [['description'], 'string'],
            [['createDate'], 'safe'],
            [['title'], 'string', 'max' => 150],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryActivities::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['stylist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stylists::className(), 'targetAttribute' => ['stylist_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'category_id' => Yii::t('app', 'Category ID'),
            'stylist_id' => Yii::t('app', 'Stylist ID'),
            'description' => Yii::t('app', 'Description'),
            'createDate' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CategoryActivities::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Stylist]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStylist()
    {
        return $this->hasOne(Stylists::className(), ['id' => 'stylist_id']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['activity_id' => 'id']);
    }
}
