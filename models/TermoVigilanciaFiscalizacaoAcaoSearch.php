<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoAcao;

/**
 * TermoVigilanciaFiscalizacaoAcaoSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoAcao`.
 */
class TermoVigilanciaFiscalizacaoAcaoSearch extends TermoVigilanciaFiscalizacaoAcao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_acao_id', 'vigilancia_fiscalizacao_acao_st', 'vigilancia_fiscalizacao_acao_cmp_complentar'], 'integer'],
            [['vigilancia_fiscalizacao_acao_nome'], 'safe'],
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
        $query = TermoVigilanciaFiscalizacaoAcao::find();

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
            'vigilancia_fiscalizacao_acao_id' => $this->vigilancia_fiscalizacao_acao_id,
            'vigilancia_fiscalizacao_acao_st' => $this->vigilancia_fiscalizacao_acao_st,
            'vigilancia_fiscalizacao_acao_cmp_complentar' => $this->vigilancia_fiscalizacao_acao_cmp_complentar,
        ]);

        $query->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_acao_nome', $this->vigilancia_fiscalizacao_acao_nome]);

        return $dataProvider;
    }
}
