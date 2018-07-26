<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoVeiculo;

/**
 * TermoVigilanciaFiscalizacaoVeiculoSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoVeiculo`.
 */
class TermoVigilanciaFiscalizacaoVeiculoSearch extends TermoVigilanciaFiscalizacaoVeiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_veiculo_id', 'vigilancia_fiscalizacao_veiculo_km_incial', 'vigilancia_fiscalizacao_veiculo_km_final'], 'integer'],
            [['vigilancia_fiscalizacao_veiculo_placa', 'vigilancia_fiscalizacao_veiculo_data_create'], 'safe'],
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
        $query = TermoVigilanciaFiscalizacaoVeiculo::find();

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
            'vigilancia_fiscalizacao_veiculo_id' => $this->vigilancia_fiscalizacao_veiculo_id,
            'vigilancia_fiscalizacao_veiculo_km_incial' => $this->vigilancia_fiscalizacao_veiculo_km_incial,
            'vigilancia_fiscalizacao_veiculo_km_final' => $this->vigilancia_fiscalizacao_veiculo_km_final,
            'vigilancia_fiscalizacao_veiculo_data_create' => $this->vigilancia_fiscalizacao_veiculo_data_create,
        ]);

        $query->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_veiculo_placa', $this->vigilancia_fiscalizacao_veiculo_placa]);

        return $dataProvider;
    }
}
