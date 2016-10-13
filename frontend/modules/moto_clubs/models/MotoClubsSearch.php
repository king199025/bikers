<?php

namespace frontend\modules\moto_clubs\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\moto_clubs\models\MotoClubs;

/**
 * MotoClubsSearch represents the model behind the search form about `frontend\modules\moto_clubs\models\MotoClubs`.
 */
class MotoClubsSearch extends MotoClubs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'filial', 'dt_start', 'status'], 'integer'],
            [['name_rus', 'name_en', 'address', 'logo', 'site', 'group_vk', 'group_fb', 'group_ok', 'email', 'phone', 'skype', 'description', 'slug'], 'safe'],
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
        $query = MotoClubs::find();

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
            'type' => $this->type,
            'filial' => $this->filial,
            'dt_start' => $this->dt_start,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name_rus', $this->name_rus])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'group_vk', $this->group_vk])
            ->andFilterWhere(['like', 'group_fb', $this->group_fb])
            ->andFilterWhere(['like', 'group_ok', $this->group_ok])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
