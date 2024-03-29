<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\base\View;

/**
 * ViewSearch represents the model behind the search form of `common\models\base\View`.
 */
class ViewSearch extends View
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_view', 'id_products', 'view_count'], 'integer'],
            [['view_date'], 'safe'],
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
        $query = View::find();

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
            'id_view' => $this->id_view,
            'id_products' => $this->id_products,
            'view_count' => $this->view_count,
        ]);

        $query->andFilterWhere(['like', 'view_date', $this->view_date]);

        return $dataProvider;
    }
}
