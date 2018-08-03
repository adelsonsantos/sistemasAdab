<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DadosUnicoPessoaJuridica;

/**
 * DadosUnicoPessoaJuridicaSearch represents the model behind the search form of `app\models\DadosUnicoPessoaJuridica`.
 */
class DadosUnicoPessoaJuridicaSearch extends DadosUnicoPessoaJuridica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id'], 'integer'],
            [['pessoa_juridica_cnpj', 'pessoa_juridica_nm_fantasia', 'pessoa_juridica_insc_mun', 'pessoa_juridica_insc_est', 'pessoa_juridica_dt_abertura', 'pessoa_juridica_contato'], 'safe'],
            [['pessoa_juridica_fornecedor'], 'number'],
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
        $query = DadosUnicoPessoaJuridica::find();

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
            'pessoa_id' => $this->pessoa_id,
            'pessoa_juridica_fornecedor' => $this->pessoa_juridica_fornecedor,
        ]);

        $query->andFilterWhere(['ilike', 'pessoa_juridica_cnpj', $this->pessoa_juridica_cnpj])
            ->andFilterWhere(['ilike', 'pessoa_juridica_nm_fantasia', $this->pessoa_juridica_nm_fantasia])
            ->andFilterWhere(['ilike', 'pessoa_juridica_insc_mun', $this->pessoa_juridica_insc_mun])
            ->andFilterWhere(['ilike', 'pessoa_juridica_insc_est', $this->pessoa_juridica_insc_est])
            ->andFilterWhere(['ilike', 'pessoa_juridica_dt_abertura', $this->pessoa_juridica_dt_abertura])
            ->andFilterWhere(['ilike', 'pessoa_juridica_contato', $this->pessoa_juridica_contato]);

        return $dataProvider;
    }
}
