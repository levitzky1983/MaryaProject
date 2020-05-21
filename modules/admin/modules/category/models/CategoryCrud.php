<?php

namespace app\modules\admin\modules\category\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\categoryActivities;

/**
 * CategoryCrud represents the model behind the search form of `app\models\categoryActivities`.
 */
class CategoryCrud extends categoryActivities
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price','position'], 'integer'],
            ['addCategory','boolean'],
            [['title', 'description', 'preview','timing'], 'safe'],
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
        $query = categoryActivities::find();

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
            'position' => $this->position,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'timing', $this->timing])
            ->andFilterWhere(['like', 'addCategory', $this->addCategory])
            ->andFilterWhere(['like', 'preview', $this->preview]);

        return $dataProvider;
    }
}
