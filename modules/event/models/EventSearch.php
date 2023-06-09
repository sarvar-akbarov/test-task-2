<?php

namespace app\modules\event\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\event\models\Event;

/**
 * EventSearch represents the model behind the search form of `app\modules\event\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_blocked', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['event_name', 'recipient'], 'safe'],
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
        $query = Event::find();

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
            'is_blocked' => $this->is_blocked,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'recipient', $this->recipient]);

        return $dataProvider;
    }
}
