<?php

namespace asoliman\yii2\seo\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use asoliman\yii2\seo\models\Meta;

/**
 * metaSearch represents the model behind the search form about `vendor\asoliman\models\Meta`.
 */
class metaSearch extends Meta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['hash', 'route', 'robots_index', 'robots_follow', 'author', 'title', 'keywords', 'description', 'canonical', 'created_at', 'updated_at'], 'safe'],
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
        $query = Meta::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'hash', $this->hash])
            ->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'robots_index', $this->robots_index])
            ->andFilterWhere(['like', 'robots_follow', $this->robots_follow])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'canonical', $this->canonical]);

        return $dataProvider;
    }
}
