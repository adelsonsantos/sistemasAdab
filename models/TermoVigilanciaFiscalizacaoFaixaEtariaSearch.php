<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoFaixaEtaria;

/**
 * TermoVigilanciaFiscalizacaoFaixaEtariaSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoFaixaEtaria`.
 */
class TermoVigilanciaFiscalizacaoFaixaEtariaSearch extends TermoVigilanciaFiscalizacaoFaixaEtaria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_animal_faixa_etaria_id', 'vigilancia_fiscalizacao_animal_id'], 'integer'],
            [['vigilancia_fiscalizacao_faixa_animal_etaria_periodo'], 'safe'],
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
        $query = TermoVigilanciaFiscalizacaoFaixaEtaria::find();

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
            'vigilancia_fiscalizacao_animal_faixa_etaria_id' => $this->vigilancia_fiscalizacao_animal_faixa_etaria_id,
            'vigilancia_fiscalizacao_animal_id' => $this->vigilancia_fiscalizacao_animal_id,
        ]);

        $query->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_animal_faixa_etaria_periodo', $this->vigilancia_fiscalizacao_animal_faixa_etaria_periodo]);

        return $dataProvider;
    }
}
