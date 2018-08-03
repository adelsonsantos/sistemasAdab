<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoProdutor;

/**
 * TermoVigilanciaFiscalizacaoProdutorSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoProdutor`.
 */
class TermoVigilanciaFiscalizacaoProdutorSearch extends TermoVigilanciaFiscalizacaoProdutor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_produtor_id', 'vigilancia_fiscalizacao_produtor_tipo_id'], 'integer'],
            [['vigilancia_fiscalizacao_produtor_cpf', 'vigilancia_fiscalizacao_produtor_cnpj', 'vigilancia_fiscalizacao_produtor_svo', 'vigilancia_fiscalizacao_produtor_nome'], 'safe'],
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
        $query = TermoVigilanciaFiscalizacaoProdutor::find();

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
            'vigilancia_fiscalizacao_produtor_id' => $this->vigilancia_fiscalizacao_produtor_id,
            'vigilancia_fiscalizacao_produtor_tipo_id' => $this->vigilancia_fiscalizacao_produtor_tipo_id,
        ]);

        $query->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_produtor_cpf', $this->vigilancia_fiscalizacao_produtor_cpf])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_produtor_cnpj', $this->vigilancia_fiscalizacao_produtor_cnpj])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_produtor_svo', $this->vigilancia_fiscalizacao_produtor_svo])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_produtor_nome', $this->vigilancia_fiscalizacao_produtor_nome]);

        return $dataProvider;
    }
}
