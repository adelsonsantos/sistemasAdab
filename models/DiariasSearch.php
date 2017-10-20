<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * DiariasSearch represents the model behind the search form about `app\models\Diarias`.
 */
class DiariasSearch extends Diarias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'diaria_solicitante', 'diaria_beneficiario', 'meio_transporte_id', 'diaria_unidade_custo', 'projeto_cd', 'acao_cd', 'territorio_cd', 'diaria_st', 'diaria_cancelada', 'diaria_devolvida', 'diaria_empenho_pessoa_id', 'diaria_extrato_empenho', 'convenio_id', 'indenizacao', 'ger_id', 'id_coordenadoria', 'diaria_agrupada', 'imp_diaria_agrupa', 'diaria_indvidual', 'etapa_id', 'pedido_empenho', 'qtde_roteiros'], 'integer'],
            [['diaria_numero', 'diaria_dt_saida', 'diaria_hr_saida', 'diaria_dt_chegada', 'diaria_hr_chegada', 'diaria_valor_ref', 'diaria_desconto', 'diaria_qtde', 'diaria_valor', 'diaria_justificativa_feriado', 'diaria_transporte_obs', 'diaria_descricao', 'fonte_cd', 'diaria_dt_criacao', 'diaria_hr_criacao', 'diaria_justificativa_fds', 'diaria_processo', 'diaria_empenho', 'diaria_dt_empenho', 'diaria_roteiro_complemento', 'diaria_processo_fisico', 'diaria_hr_empenho', 'diaria_local_solicitacao', 'data_viagem_saida', 'data_viagem_chegada', 'super_sd', 'diaria_dt_alteracao'], 'safe'],
            [['diaria_excluida', 'diaria_comprovada'], 'number'],
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

    public function getSearchPorPermissao()
    {
        $data =      date_create($this->converterStringToData('31/12/2011'));
        $dataCriacao = date_format($data,"Y-m-d");

        switch (implode(ArrayHelper::map(PublicAuthAssignment::find()->asArray()->where(['user_id' => Yii::$app->user->getId()])->all(), 'item_name', 'item_name'))) {
            case 'administrador':
                return Diarias::find()
                    ->where('diaria_st <> 7')
                    ->andWhere(['diaria_excluida' => 0])
                    ->andWhere(['>=','diaria_dt_criacao', $dataCriacao]);
            break;
            default:
                return Diarias::find()
                    ->where('diaria_st <> 7')
                    ->andWhere(['diaria_excluida' => 0])
                    ->andWhere(['diaria_beneficiario' => Yii::$app->user->getId()])->orWhere(['diaria_solicitante' => Yii::$app->user->getId()]);
                break;
        }
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
        $query = $this->getSearchPorPermissao();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['diaria_id'=>SORT_DESC, ]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'diaria_id' => $this->diaria_id,
            'diaria_solicitante' => $this->diaria_solicitante,
            'diaria_beneficiario' => $this->diaria_beneficiario,
            'meio_transporte_id' => $this->meio_transporte_id,
            'diaria_unidade_custo' => $this->diaria_unidade_custo,
            'projeto_cd' => $this->projeto_cd,
            'acao_cd' => $this->acao_cd,
            'territorio_cd' => $this->territorio_cd,
            'diaria_st' => $this->diaria_st,
            'diaria_cancelada' => $this->diaria_cancelada,
            'diaria_devolvida' => $this->diaria_devolvida,
            'diaria_dt_criacao' => $this->diaria_dt_criacao,
            'diaria_dt_empenho' => $this->diaria_dt_empenho,
            'diaria_excluida' => $this->diaria_excluida,
            'diaria_comprovada' => $this->diaria_comprovada,
            'diaria_empenho_pessoa_id' => $this->diaria_empenho_pessoa_id,
            'diaria_hr_empenho' => $this->diaria_hr_empenho,
            'diaria_extrato_empenho' => $this->diaria_extrato_empenho,
            'convenio_id' => $this->convenio_id,
            'indenizacao' => $this->indenizacao,
            'ger_id' => $this->ger_id,
            'id_coordenadoria' => $this->id_coordenadoria,
            'data_viagem_saida' => $this->data_viagem_saida,
            'data_viagem_chegada' => $this->data_viagem_chegada,
            'diaria_agrupada' => $this->diaria_agrupada,
            'imp_diaria_agrupa' => $this->imp_diaria_agrupa,
            'diaria_indvidual' => $this->diaria_indvidual,
            'diaria_dt_alteracao' => $this->diaria_dt_alteracao,
            'etapa_id' => $this->etapa_id,
            'pedido_empenho' => $this->pedido_empenho,
            'qtde_roteiros' => $this->qtde_roteiros,
        ]);

        $query->andFilterWhere(['like', 'diaria_numero', $this->diaria_numero])
            ->andFilterWhere(['like', 'diaria_dt_saida', $this->diaria_dt_saida])
            ->andFilterWhere(['like', 'diaria_hr_saida', $this->diaria_hr_saida])
            ->andFilterWhere(['like', 'diaria_dt_chegada', $this->diaria_dt_chegada])
            ->andFilterWhere(['like', 'diaria_hr_chegada', $this->diaria_hr_chegada])
            ->andFilterWhere(['like', 'diaria_valor_ref', $this->diaria_valor_ref])
            ->andFilterWhere(['like', 'diaria_desconto', $this->diaria_desconto])
            ->andFilterWhere(['like', 'diaria_qtde', $this->diaria_qtde])
            ->andFilterWhere(['like', 'diaria_valor', $this->diaria_valor])
            ->andFilterWhere(['like', 'diaria_justificativa_feriado', $this->diaria_justificativa_feriado])
            ->andFilterWhere(['like', 'diaria_transporte_obs', $this->diaria_transporte_obs])
            ->andFilterWhere(['like', 'diaria_descricao', $this->diaria_descricao])
            ->andFilterWhere(['like', 'fonte_cd', $this->fonte_cd])
            ->andFilterWhere(['like', 'diaria_hr_criacao', $this->diaria_hr_criacao])
            ->andFilterWhere(['like', 'diaria_justificativa_fds', $this->diaria_justificativa_fds])
            ->andFilterWhere(['like', 'diaria_processo', $this->diaria_processo])

            ->andFilterWhere(['in', 'diaria_empenho', $this->diaria_empenho])

            //->andFilterWhere(['in', 'diaria_empenho', $this->diaria_empenho])
            ->andFilterWhere(['in', 'diaria_empenho', $this->diaria_empenho])
            ->andFilterWhere(['like', 'diaria_roteiro_complemento', $this->diaria_roteiro_complemento])
            ->andFilterWhere(['like', 'diaria_processo_fisico', $this->diaria_processo_fisico])
            ->andFilterWhere(['like', 'diaria_local_solicitacao', $this->diaria_local_solicitacao])
            ->andFilterWhere(['like', 'super_sd', $this->super_sd]);

        return $dataProvider;
    }
}
