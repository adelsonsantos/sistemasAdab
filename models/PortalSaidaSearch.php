<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalSaida;

/**
 * PortalSaidaSearch represents the model behind the search form of `app\models\PortalSaida`.
 */
class PortalSaidaSearch extends PortalSaida
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saida_id', 'saida_quantidade', 'equipamento_id', 'setor_id', 'saida_status'], 'integer'],
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
        $query = PortalSaida::find();

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
            'saida_id' => $this->saida_id,
            'saida_quantidade' => $this->saida_quantidade,
            'equipamento_id' => $this->equipamento_id,
            'setor_id' => $this->setor_id,
            'saida_status' => $this->saida_status,
        ]);

        return $dataProvider;
    }
}
