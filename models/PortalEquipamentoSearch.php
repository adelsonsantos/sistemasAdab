<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalEquipamento;

/**
 * PortalEquipamentoSearch represents the model behind the search form of `app\models\PortalEquipamento`.
 */
class PortalEquipamentoSearch extends PortalEquipamento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipamento_id', 'equipamento_quantidade_min', 'equipamento_status', 'equipamento_pessoa'], 'integer'],
            [['equipamento_nome', 'equipamento_data'], 'safe'],
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
        $query = PortalEquipamento::find();

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
            'equipamento_id' => $this->equipamento_id,
            'equipamento_quantidade_min' => $this->equipamento_quantidade_min,
            'equipamento_status' => $this->equipamento_status,
            'equipamento_pessoa' => $this->equipamento_pessoa,
            'equipamento_data' => $this->equipamento_data,
        ]);

        $query->andFilterWhere(['ilike', 'equipamento_nome', $this->equipamento_nome]);

        return $dataProvider;
    }
}
