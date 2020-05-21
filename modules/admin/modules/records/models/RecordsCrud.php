<?php

namespace app\modules\admin\modules\records\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\record\models\RecordsActivityBase;

/**
 * RecordsCrud represents the model behind the search form of `app\modules\record\models\RecordsActivityBase`.
 */
class RecordsCrud extends RecordsActivityBase
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categoryActivity_id'], 'integer'],
            [['firstName', 'phone', 'date', 'createDate'], 'safe'],
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
        $query = RecordsActivityBase::find();

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
            'categoryActivity_id' => $this->categoryActivity_id,
            'createDate' => $this->createDate,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
