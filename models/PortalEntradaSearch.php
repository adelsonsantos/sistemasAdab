<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalEntrada;

/**
 * PortalEntradaSearch represents the model behind the search form of `app\models\PortalEntrada`.
 */
class PortalEntradaSearch extends PortalEntrada
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrada_id', 'entrada_quantidade', 'equipamento_id', 'setor_id', 'entrada_status', 'entrada_pessoa'], 'integer'],
            [['entrada_data'], 'safe'],
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
        $query = PortalEntrada::find();

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
            'entrada_id' => $this->entrada_id,
            'entrada_quantidade' => $this->entrada_quantidade,
            'equipamento_id' => $this->equipamento_id,
            'setor_id' => $this->setor_id,
            'entrada_status' => $this->entrada_status,
            'entrada_pessoa' => $this->entrada_pessoa,
            'entrada_data' => $this->entrada_data,
        ]);

        return $dataProvider;
    }
}
