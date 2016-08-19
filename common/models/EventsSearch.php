<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Events;

/**
 * EventsSearch represents the model behind the search form about `common\models\db\Events`.
 */
class EventsSearch extends Events
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_from', 'dt_to', 'radius', 'is_near'], 'integer'],
            [['word', 'cities', 'region'], 'string'],
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
        $query = Events::find()
        ->leftJoin('City','`events`.`city` = `City`.`ID`')
        ->leftJoin('event_organizers','`event_organizers`.`event_id` = `events`.`id`')
        ->leftJoin('clubs','`event_organizers`.`club_id` = `clubs`.`id`')
        ->leftJoin('user','`event_organizers`.`user_id` = `user`.`id`');

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
        /*
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
        ]);
        */
        $query->orFilterWhere(['like',"`City`.`Name`",$word)
              ->orFilterWhere('like',"`events`.`name`",$word)
              ->orFilterWhere('like',"`clubs`.`name`",$word)
              ->orFilterWhere('like',"`user`.`road_nickname`",$word);

        return $dataProvider;
    }
}
