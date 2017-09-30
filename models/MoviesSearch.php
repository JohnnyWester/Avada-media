<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Movies;

/**
 * MoviesSearch represents the model behind the search form about `app\models\Movies`.
 */
class MoviesSearch extends Movies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'viewed'], 'integer'],
            [['title', 'description', 'text', 'date', 'image', 'length', 'premiere', 'directors', 'writers', 'stars', 'movie'], 'safe'],
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
        $query = Movies::find();

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
            'date' => $this->date,
            'premiere' => $this->premiere,
            'viewed' => $this->viewed,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'length', $this->length])
            ->andFilterWhere(['like', 'directors', $this->directors])
            ->andFilterWhere(['like', 'writers', $this->writers])
            ->andFilterWhere(['like', 'stars', $this->stars])
            ->andFilterWhere(['like', 'movie', $this->movie]);

        return $dataProvider;
    }
}
