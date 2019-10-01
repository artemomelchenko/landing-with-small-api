<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Items;

/**
 * ItemsSearch represents the model behind the search form of `common\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_categories'], 'integer'],
            [['name', 'length', 'height', 'full_weight', 'weight'], 'safe'],
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
        $query = Items::find();

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
            'id_categories' => $this->id_categories,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'length', $this->length])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'full_weight', $this->full_weight])
            ->andFilterWhere(['like', 'weight', $this->weight]);

        return $dataProvider;
    }
}
