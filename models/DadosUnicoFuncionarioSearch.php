<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DadosUnicoFuncionario;

/**
 * DadosUnicoFuncionarioSearch represents the model behind the search form of `app\models\DadosUnicoFuncionario`.
 */
class DadosUnicoFuncionarioSearch extends DadosUnicoFuncionario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['funcionario_id', 'pessoa_id', 'funcionario_tipo_id', 'funcao_id', 'cargo_permanente', 'funcionario_orgao_origem', 'contrato_id', 'cargo_temporario', 'funcionario_orgao_destino', 'est_organizacional_lotacao_id', 'funcionario_tipo_id_old', 'motorista'], 'integer'],
            [['funcionario_matricula', 'funcionario_ramal', 'funcionario_email', 'funcionario_dt_admissao', 'funcionario_dt_demissao', 'funcionario_conta_fgts', 'funcionario_salario', 'funcionario_onus'], 'safe'],
            [['funcionario_validacao_propria', 'funcionario_validacao_rh', 'funcionario_envio_email'], 'number'],
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
        $query = DadosUnicoFuncionario::find();

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
            'funcionario_id' => $this->funcionario_id,
            'pessoa_id' => $this->pessoa_id,
            'funcionario_tipo_id' => $this->funcionario_tipo_id,
            'funcao_id' => $this->funcao_id,
            'cargo_permanente' => $this->cargo_permanente,
            'funcionario_orgao_origem' => $this->funcionario_orgao_origem,
            'contrato_id' => $this->contrato_id,
            'cargo_temporario' => $this->cargo_temporario,
            'funcionario_orgao_destino' => $this->funcionario_orgao_destino,
            'est_organizacional_lotacao_id' => $this->est_organizacional_lotacao_id,
            'funcionario_validacao_propria' => $this->funcionario_validacao_propria,
            'funcionario_validacao_rh' => $this->funcionario_validacao_rh,
            'funcionario_envio_email' => $this->funcionario_envio_email,
            'funcionario_tipo_id_old' => $this->funcionario_tipo_id_old,
            'motorista' => $this->motorista,
        ]);

        $query->andFilterWhere(['ilike', 'funcionario_matricula', $this->funcionario_matricula])
            ->andFilterWhere(['ilike', 'funcionario_ramal', $this->funcionario_ramal])
            ->andFilterWhere(['ilike', 'funcionario_email', $this->funcionario_email])
            ->andFilterWhere(['ilike', 'funcionario_dt_admissao', $this->funcionario_dt_admissao])
            ->andFilterWhere(['ilike', 'funcionario_dt_demissao', $this->funcionario_dt_demissao])
            ->andFilterWhere(['ilike', 'funcionario_conta_fgts', $this->funcionario_conta_fgts])
            ->andFilterWhere(['ilike', 'funcionario_salario', $this->funcionario_salario])
            ->andFilterWhere(['ilike', 'funcionario_onus', $this->funcionario_onus]);

        return $dataProvider;
    }
}
