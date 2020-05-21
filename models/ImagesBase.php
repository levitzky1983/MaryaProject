<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $name
 * @property int $activity_id
 * @property boolean $portfolio
 * @property string $createDate
 * @property Activities $activity
 */
class ImagesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','activity_id'], 'required'],
            [['name'],'string','max'=>250],
            [['activity_id'], 'integer'],
            [['createDate'], 'safe'],
            [['portfolio'], 'boolean'],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activities::className(), 'targetAttribute' => ['activity_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' =>Yii::t('app','Name'),
            'activity_id' => Yii::t('app', 'Activity ID'),
            'portfolio' => Yii::t('app', 'Portfolio'),
            'createDate' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[Activity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activities::className(), ['id' => 'activity_id']);
    }


        public function getStylist()
    {
        return $this->hasOne(Stylists::className(), ['id' => 'stylist_id'])
        ->via('activity');
    }
}
