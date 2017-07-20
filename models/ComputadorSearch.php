<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalComputador;

/**
 * ComputadorSearch represents the model behind the search form about `app\models\PortalComputador`.
 */
class ComputadorSearch extends PortalComputador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_id', 'id_coordenadoria', 'ger_id'], 'integer'],
            [['com_mac'], 'safe'],
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
        $query = PortalComputador::find();

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
            'com_id' => $this->com_id,
            'id_coordenadoria' => $this->id_coordenadoria,
            'ger_id' => $this->ger_id,
        ]);

        $query->andFilterWhere(['like', 'com_mac', $this->com_mac]);

        return $dataProvider;
    }
}
