<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RedaFichaInscricao;

/**
 * RedaFichaInscricaoSearch represents the model behind the search form of `app\models\RedaFichaInscricao`.
 */
class RedaFichaInscricaoSearch extends RedaFichaInscricao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDE_FICHA_INSCRICAO', 'IDE_PROCESSO_SELETIVO', 'STS_DEFICIENTE_FISICO', 'STS_FILHOS', 'QTD_FILHOS', 'STS_APROVADO', 'COD_CARGO_CURSO_PROCESSO'], 'integer'],
            [['NOM_CANDIDATO', 'DTC_NASCIMENTO', 'NUM_CPF', 'NUM_RG', 'NOM_ORGAO_EMISSOR', 'DES_ESTADO_CIVIL', 'DES_DEFICIENCIA', 'DES_ENDERECO', 'NOM_BAIRRO', 'NUM_CEP', 'NOM_CIDADE', 'NOM_ESTADO', 'NUM_TELEFONE01', 'NUM_TELEFONE02', 'DES_EMAIL', 'DTC_CADASTRO', 'NUM_CNH', 'TIP_CATEGORIA', 'DTC_VALIDADE_CNH', 'DES_CARGO_CURSO_PROCESSO', 'DES_RACA'], 'safe'],
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
        $query = RedaFichaInscricao::find();

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
            'IDE_FICHA_INSCRICAO' => $this->IDE_FICHA_INSCRICAO,
            'IDE_PROCESSO_SELETIVO' => $this->IDE_PROCESSO_SELETIVO,
            'DTC_NASCIMENTO' => $this->DTC_NASCIMENTO,
            'STS_DEFICIENTE_FISICO' => $this->STS_DEFICIENTE_FISICO,
            'STS_FILHOS' => $this->STS_FILHOS,
            'QTD_FILHOS' => $this->QTD_FILHOS,
            'DTC_CADASTRO' => $this->DTC_CADASTRO,
            'STS_APROVADO' => $this->STS_APROVADO,
            'DTC_VALIDADE_CNH' => $this->DTC_VALIDADE_CNH,
            'COD_CARGO_CURSO_PROCESSO' => $this->COD_CARGO_CURSO_PROCESSO,
        ]);

        $query->andFilterWhere(['like', 'NOM_CANDIDATO', $this->NOM_CANDIDATO])
            ->andFilterWhere(['like', 'NUM_CPF', $this->NUM_CPF])
            ->andFilterWhere(['like', 'NUM_RG', $this->NUM_RG])
            ->andFilterWhere(['like', 'NOM_ORGAO_EMISSOR', $this->NOM_ORGAO_EMISSOR])
            ->andFilterWhere(['like', 'DES_ESTADO_CIVIL', $this->DES_ESTADO_CIVIL])
            ->andFilterWhere(['like', 'DES_DEFICIENCIA', $this->DES_DEFICIENCIA])
            ->andFilterWhere(['like', 'DES_ENDERECO', $this->DES_ENDERECO])
            ->andFilterWhere(['like', 'NOM_BAIRRO', $this->NOM_BAIRRO])
            ->andFilterWhere(['like', 'NUM_CEP', $this->NUM_CEP])
            ->andFilterWhere(['like', 'NOM_CIDADE', $this->NOM_CIDADE])
            ->andFilterWhere(['like', 'NOM_ESTADO', $this->NOM_ESTADO])
            ->andFilterWhere(['like', 'NUM_TELEFONE01', $this->NUM_TELEFONE01])
            ->andFilterWhere(['like', 'NUM_TELEFONE02', $this->NUM_TELEFONE02])
            ->andFilterWhere(['like', 'DES_EMAIL', $this->DES_EMAIL])
            ->andFilterWhere(['like', 'NUM_CNH', $this->NUM_CNH])
            ->andFilterWhere(['like', 'TIP_CATEGORIA', $this->TIP_CATEGORIA])
            ->andFilterWhere(['like', 'DES_CARGO_CURSO_PROCESSO', $this->DES_CARGO_CURSO_PROCESSO])
            ->andFilterWhere(['like', 'DES_RACA', $this->DES_RACA]);

        return $dataProvider;
    }
}
