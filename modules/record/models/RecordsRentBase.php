<?php

namespace app\modules\record\models;

use Yii;

/**
 * This is the model class for table "recordsrent".
 *
 * @property int $id
 * @property string|null $lastName
 * @property string $firstName
 * @property string $phone
 * @property string $date
 * @property string $createDate
 */
class RecordsRentBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recordsrent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'phone', 'date'], 'required'],
            [['createDate'], 'safe'],
            [['lastName', 'firstName', 'phone', 'date'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lastName' => Yii::t('app', 'Last Name'),
            'firstName' => Yii::t('app', 'First Name'),
            'phone' => Yii::t('app', 'Phone'),
            'date' => Yii::t('app', 'Date'),
            'createDate' => Yii::t('app', 'Create Date'),
        ];
    }
}
