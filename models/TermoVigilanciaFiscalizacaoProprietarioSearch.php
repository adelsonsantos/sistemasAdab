<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoProprietario;

/**
 * TermoVigilanciaFiscalizacaoProprietarioSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoProprietario`.
 */
class TermoVigilanciaFiscalizacaoProprietarioSearch extends TermoVigilanciaFiscalizacaoProprietario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_proprietario_id', 'vigilancia_fiscalizacao_proprietario_tipo_id'], 'integer'],
            [['vigilancia_fiscalizacao_proprietario_cpf', 'vigilancia_fiscalizacao_proprietario_cnpj', 'vigilancia_fiscalizacao_proprietario_svo','vigilancia_fiscalizacao_proprietario_nome' ], 'safe'],
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
        $query = TermoVigilanciaFiscalizacaoProprietario::find();

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
            'vigilancia_fiscalizacao_proprietario_id' => $this->vigilancia_fiscalizacao_proprietario_id,
            'vigilancia_fiscalizacao_proprietario_tipo_id' => $this->vigilancia_fiscalizacao_proprietario_tipo_id,
        ]);

        $query->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_proprietario_cpf', $this->vigilancia_fiscalizacao_proprietario_cpf])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_proprietario_cnpj', $this->vigilancia_fiscalizacao_proprietario_cnpj])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_proprietario_svo', $this->vigilancia_fiscalizacao_proprietario_svo])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_proprietario_nome', $this->vigilancia_fiscalizacao_proprietario_nome]);

        return $dataProvider;
    }
}
