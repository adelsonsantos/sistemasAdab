<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalManutencao;

/**
 * PortalManutencaoSearch represents the model behind the search form of `app\models\PortalManutencao`.
 */
class PortalManutencaoSearch extends PortalManutencao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manutencao_id', 'tombo_id', 'manutencao_pessoa_recebimento_inf', 'manutencao_beneficiario', 'manutencao_func_devolucao_inf', 'manutencao_beneficiario_devolucao', 'manutencao_status'], 'integer'],
            [['manutencao_data_recebimento', 'manutencao_data_devolucao', 'manutencao_descricao', 'manutencao_resolucao'], 'safe'],
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
        $query = PortalManutencao::find();

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
            'manutencao_id' => $this->manutencao_id,
            'tombo_id' => $this->tombo_id,
            'manutencao_data_recebimento' => $this->manutencao_data_recebimento,
            'manutencao_pessoa_recebimento_inf' => $this->manutencao_pessoa_recebimento_inf,
            'manutencao_beneficiario' => $this->manutencao_beneficiario,
            'manutencao_data_devolucao' => $this->manutencao_data_devolucao,
            'manutencao_func_devolucao_inf' => $this->manutencao_func_devolucao_inf,
            'manutencao_beneficiario_devolucao' => $this->manutencao_beneficiario_devolucao,
            'manutencao_status' => $this->manutencao_status,
        ]);

        $query->andFilterWhere(['ilike', 'manutencao_descricao', $this->manutencao_descricao])
            ->andFilterWhere(['ilike', 'manutencao_resolucao', $this->manutencao_resolucao]);

        return $dataProvider;
    }
}
