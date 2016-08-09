<?php

namespace frontend\modules\garage\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\garage\models\Garage;

/**
 * GarageSearch represents the model behind the search form about `frontend\modules\garage\models\Garage`.
 */
class GarageSearch extends Garage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'mark_id', 'model_id', 'year', 'volume', 'used'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Garage::find();

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
            'user_id' => $this->user_id,
            'mark_id' => $this->mark_id,
            'model_id' => $this->model_id,
            'year' => $this->year,
            'volume' => $this->volume,
            'used' => $this->used,
        ]);


        return $dataProvider;
    }
}
