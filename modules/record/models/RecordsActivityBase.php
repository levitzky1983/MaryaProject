<?php

namespace app\modules\record\models;

use app\models\CategoryActivities;
use Yii;

/**
 * This is the model class for table "recordsactivity".
 *
 * @property int $id
 * @property string $firstName
 * @property string $phone
 * @property string $date
 * @property int $categoryActivity_id
 * @property string $createDate
 *
 * @property CategoryActivities $categoryActivity
 */
class RecordsActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recordsactivity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'phone', 'date', 'categoryActivity_id'], 'required'],
            [['categoryActivity_id'], 'integer'],
            [['createDate'], 'safe'],
            [['firstName', 'phone', 'date'], 'string', 'max' => 150],
            [['categoryActivity_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryActivities::class, 'targetAttribute' => ['categoryActivity_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstName' => Yii::t('app', 'Ваше имя'),
            'phone' => Yii::t('app', 'Контактный телефон'),
            'date' => Yii::t('app', 'Дата'),
            'categoryActivity_id' => Yii::t('app', 'Услуга'),
            'createDate' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[CategoryActivity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryActivity()
    {
        return $this->hasOne(CategoryActivities::className(), ['id' => 'categoryActivity_id']);
    }
}
