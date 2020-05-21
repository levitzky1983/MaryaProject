<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $userName
 * @property string $passwordHash
 * @property string|null $authKey
 * @property string|null $token
 * @property string $createDate
 *
 * @property Comments[] $comments
 */
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userName','passwordHash'], 'required'],
            [['createDate'], 'safe'],
            [['userName'], 'string', 'max' => 100],
            [['passwordHash', 'authKey', 'token'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userName' => Yii::t('app', 'User Name'),
            'passwordHash' => Yii::t('app', 'Password Hash'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'token' => Yii::t('app', 'Token'),
            'createDate' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['user_id' => 'id']);
    }
}
