<?php

namespace backend\modules\events\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\events\models\Events;

/**
 * EventsSearch represents the model behind the search form about `backend\modules\events\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city', 'city_near', 'dt_start', 'dt_end', 'type', 'organizer', 'tags', 'user_id', 'status'], 'integer'],
            [['name', 'site_url', 'vk_url', 'ok_url', 'fb_url', 'other_link1', 'other_link2', 'other_link3', 'afisha', 'program'], 'safe'],
            [['lon', 'lat'], 'number'],
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
        $query = Events::find();

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
            'city' => $this->city,
            'city_near' => $this->city_near,
            'lon' => $this->lon,
            'lat' => $this->lat,
            'dt_start' => $this->dt_start,
            'dt_end' => $this->dt_end,
            'type' => $this->type,
            'organizer' => $this->organizer,
            'tags' => $this->tags,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'site_url', $this->site_url])
            ->andFilterWhere(['like', 'vk_url', $this->vk_url])
            ->andFilterWhere(['like', 'ok_url', $this->ok_url])
            ->andFilterWhere(['like', 'fb_url', $this->fb_url])
            ->andFilterWhere(['like', 'other_link1', $this->other_link1])
            ->andFilterWhere(['like', 'other_link2', $this->other_link2])
            ->andFilterWhere(['like', 'other_link3', $this->other_link3])
            ->andFilterWhere(['like', 'afisha', $this->afisha])
            ->andFilterWhere(['like', 'program', $this->program]);

        return $dataProvider;
    }
}
