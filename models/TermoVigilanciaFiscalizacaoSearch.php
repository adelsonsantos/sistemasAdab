<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacao;

/**
 * TermoVigilanciaFiscalizacaoSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacao`.
 */
class TermoVigilanciaFiscalizacaoSearch extends TermoVigilanciaFiscalizacao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_id', 'coordenadas_id', 'gerencia_id', 'municipio_id', 'data_create', 'vigilancia_fiscalizacao_veiculo_id', 'vigilancia_fiscalizacao_status_id', 'vigilancia_fiscalizacao_vacina_id', 'vigilancia_fiscalizacao_produtor_id', 'vigilancia_fiscalizacao_local_id'], 'integer'],
            [['vigilancia_fiscalizacao_observacao'], 'safe'],
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
        $query = TermoVigilanciaFiscalizacao::find();

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
            'vigilancia_fiscalizacao_id' => $this->vigilancia_fiscalizacao_id,
            'coordenadas_id' => $this->coordenadas_id,
            'gerencia_id' => $this->gerencia_id,
            'municipio_id' => $this->municipio_id,
            'data_create' => $this->data_create,
            'vigilancia_fiscalizacao_veiculo_id' => $this->vigilancia_fiscalizacao_veiculo_id,
            'vigilancia_fiscalizacao_status_id' => $this->vigilancia_fiscalizacao_status_id,
            'vigilancia_fiscalizacao_vacina_id' => $this->vigilancia_fiscalizacao_vacina_id,
            'vigilancia_fiscalizacao_produtor_id' => $this->vigilancia_fiscalizacao_produtor_id,
            'vigilancia_fiscalizacao_local_id' => $this->vigilancia_fiscalizacao_local_id,
        ]);

        $query->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_observacao', $this->vigilancia_fiscalizacao_observacao]);

        return $dataProvider;
    }
}
