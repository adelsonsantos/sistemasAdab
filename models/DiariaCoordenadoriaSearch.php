<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DiariaCoordenadoria;

/**
 * DiariaCoordenadoriaSearch represents the model behind the search form about `app\models\DiariaCoordenadoria`.
 */
class DiariaCoordenadoriaSearch extends DiariaCoordenadoria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_coordenadoria'], 'integer'],
            [['nome'], 'safe'],
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
        $query = DiariaCoordenadoria::find()
            ->where(['not in','id_coordenadoria',[16, 0]]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['nome'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_coordenadoria' => $this->id_coordenadoria,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}
