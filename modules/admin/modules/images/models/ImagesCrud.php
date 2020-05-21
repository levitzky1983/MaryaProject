<?php

namespace app\modules\admin\modules\images\models;

use app\models\Stylists;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Images;

/**
 * ImagesCrud represents the model behind the search form of `app\models\Images`.
 */
class ImagesCrud extends Images
{
    /**
     * {@inheritdoc}
     */
    public $stylist_name;
    public function rules()
    {
        return [
            [['id', 'activity_id', ], 'integer'],
            ['portfolio','boolean'],
            [['name', 'createDate','stylist_name'], 'safe'],
            ['stylist_name','string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Images::find();
        $query->joinWith('activity');
        $query->joinWith('stylist');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'activity_id' => $this->activity_id,
            'portfolio' => $this->portfolio,
            'createDate' => $this->createDate,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like', Stylists::tableName().'.last_name', $this->stylist_name]);

        return $dataProvider;
    }
}
