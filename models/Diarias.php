<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "diaria.diaria".
 *
 * @property integer $diaria_id
 * @property string $diaria_numero
 * @property integer $diaria_solicitante
 * @property integer $diaria_beneficiario
 * @property string $diaria_dt_saida
 * @property string $diaria_hr_saida
 * @property string $diaria_dt_chegada
 * @property string $diaria_hr_chegada
 * @property string $diaria_valor_ref
 * @property string $diaria_desconto
 * @property string $diaria_qtde
 * @property string $diaria_valor
 * @property string $diaria_justificativa_feriado
 * @property integer $meio_transporte_id
 * @property string $diaria_transporte_obs
 * @property string $diaria_descricao
 * @property integer $diaria_unidade_custo
 * @property integer $projeto_cd
 * @property integer $acao_cd
 * @property integer $territorio_cd
 * @property string $fonte_cd
 * @property integer $diaria_st
 * @property integer $diaria_cancelada
 * @property integer $diaria_devolvida
 * @property string $diaria_dt_criacao
 * @property string $diaria_hr_criacao
 * @property string $diaria_justificativa_fds
 * @property string $diaria_processo
 * @property string $diaria_empenho
 * @property string $diaria_dt_empenho
 * @property string $diaria_excluida
 * @property string $diaria_roteiro_complemento
 * @property string $diaria_comprovada
 * @property string $diaria_processo_fisico
 * @property integer $diaria_empenho_pessoa_id
 * @property string $diaria_hr_empenho
 * @property integer $diaria_extrato_empenho
 * @property integer $convenio_id
 * @property integer $indenizacao
 * @property integer $ger_id
 * @property string $diaria_local_solicitacao
 * @property integer $id_coordenadoria
 * @property string $data_viagem_saida
 * @property string $data_viagem_chegada
 * @property string $super_sd
 * @property integer $diaria_agrupada
 * @property integer $imp_diaria_agrupa
 * @property integer $diaria_indvidual
 * @property string $diaria_dt_alteracao
 * @property integer $etapa_id
 * @property integer $pedido_empenho
 * @property integer $qtde_roteiros
 *
 * @property DadosUnicoEstOrganizacional $diariaUnidadeCusto
 * @property DadosUnicoPessoa $diariaSolicitante
 * @property DadosUnicoPessoa $diariaBeneficiario
 * @property DiariaAcao $acaoCd
 * @property DiariaFonte $fonteCd
 * @property DiariaMeioTransporte $meioTransporte
 * @property DiariaProjeto $projetoCd
 * @property DiariaTerritorio $territorioCd
 * @property DiariaDiariaAprovacao[] $diariaDiariaAprovacaos
 * @property DiariaDiariaArquivada[] $diariaDiariaArquivadas
 * @property DiariaDiariaAutorizacao[] $diariaDiariaAutorizacaos
 * @property DiariaDiariaCancelamento[] $diariaDiariaCancelamentos
 * @property DiariaDiariaComprovacao $diariaDiariaComprovacao
 * @property DiariaDiariaComprovacaoResumo[] $diariaDiariaComprovacaoResumos
 * @property DiariaDiariaDevolucao[] $diariaDiariaDevolucaos
 * @property DiariaDiariaLog[] $diariaDiariaLogs
 * @property DiariaDiariaMotivo[] $diariaDiariaMotivos
 * @property DiariaMotivo[] $motivos
 * @property DiariaRoteiro[] $diariaRoteiros
 * @property DiariaRoteiroComprovacao[] $diariaRoteiroComprovacaos
 */
class Diarias extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.diaria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_numero', 'diaria_solicitante', 'diaria_beneficiario', 'diaria_dt_saida', 'diaria_hr_saida', 'diaria_dt_chegada', 'diaria_hr_chegada', 'diaria_valor_ref', 'diaria_desconto', 'diaria_qtde', 'diaria_valor', 'meio_transporte_id', 'diaria_descricao', 'diaria_unidade_custo', 'projeto_cd', 'acao_cd', 'territorio_cd', 'fonte_cd', 'diaria_dt_criacao', 'diaria_hr_criacao'], 'required'],
            [['diaria_solicitante', 'diaria_beneficiario', 'meio_transporte_id', 'diaria_unidade_custo', 'projeto_cd', 'acao_cd', 'territorio_cd', 'diaria_st', 'diaria_cancelada', 'diaria_devolvida', 'diaria_empenho_pessoa_id', 'diaria_extrato_empenho', 'convenio_id', 'indenizacao', 'ger_id', 'id_coordenadoria', 'diaria_agrupada', 'imp_diaria_agrupa', 'diaria_indvidual', 'etapa_id', 'pedido_empenho', 'qtde_roteiros'], 'integer'],
            [['diaria_dt_criacao', 'diaria_dt_empenho', 'diaria_hr_empenho', 'data_viagem_saida', 'data_viagem_chegada', 'diaria_dt_alteracao'], 'safe'],
            [['diaria_excluida', 'diaria_comprovada'], 'number'],
            [['diaria_numero', 'diaria_dt_saida', 'diaria_hr_saida', 'diaria_dt_chegada', 'diaria_hr_chegada', 'diaria_valor_ref', 'diaria_hr_criacao'], 'string', 'max' => 10],
            [['diaria_desconto'], 'string', 'max' => 1],
            [['diaria_qtde', 'fonte_cd'], 'string', 'max' => 4],
            [['diaria_valor', 'diaria_local_solicitacao'], 'string', 'max' => 20],
            [['diaria_justificativa_feriado', 'diaria_transporte_obs', 'diaria_justificativa_fds'], 'string', 'max' => 255],
            [['diaria_descricao'], 'string', 'max' => 300],
            [['diaria_processo', 'diaria_empenho', 'diaria_processo_fisico'], 'string', 'max' => 30],
            [['diaria_roteiro_complemento'], 'string', 'max' => 120],
            [['super_sd'], 'string', 'max' => 12],
            [['diaria_unidade_custo'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoEstOrganizacional::className(), 'targetAttribute' => ['diaria_unidade_custo' => 'est_organizacional_id']],
            [['diaria_solicitante'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['diaria_solicitante' => 'pessoa_id']],
            [['diaria_beneficiario'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['diaria_beneficiario' => 'pessoa_id']],
            [['acao_cd'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaAcao::className(), 'targetAttribute' => ['acao_cd' => 'acao_cd']],
            [['fonte_cd'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaFonte::className(), 'targetAttribute' => ['fonte_cd' => 'fonte_cd']],
            [['meio_transporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaMeioTransporte::className(), 'targetAttribute' => ['meio_transporte_id' => 'meio_transporte_id']],
            [['projeto_cd'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaProjeto::className(), 'targetAttribute' => ['projeto_cd' => 'projeto_cd']],
            [['territorio_cd'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaTerritorio::className(), 'targetAttribute' => ['territorio_cd' => 'territorio_cd']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diaria_id' => 'Diaria ID',
            'diaria_numero' => 'Diaria Numero',
            'diaria_solicitante' => 'Diaria Solicitante',
            'diaria_beneficiario' => 'Diaria Beneficiario',
            'diaria_dt_saida' => 'Diaria Dt Saida',
            'diaria_hr_saida' => 'Diaria Hr Saida',
            'diaria_dt_chegada' => 'Diaria Dt Chegada',
            'diaria_hr_chegada' => 'Diaria Hr Chegada',
            'diaria_valor_ref' => 'Diaria Valor Ref',
            'diaria_desconto' => 'Diaria Desconto',
            'diaria_qtde' => 'Diaria Qtde',
            'diaria_valor' => 'Diaria Valor',
            'diaria_justificativa_feriado' => 'Diaria Justificativa Feriado',
            'meio_transporte_id' => 'Meio Transporte ID',
            'diaria_transporte_obs' => 'Diaria Transporte Obs',
            'diaria_descricao' => 'Diaria Descricao',
            'diaria_unidade_custo' => 'Diaria Unidade Custo',
            'projeto_cd' => 'Projeto Cd',
            'acao_cd' => 'Acao Cd',
            'territorio_cd' => 'Territorio Cd',
            'fonte_cd' => 'Fonte Cd',
            'diaria_st' => 'Diaria St',
            'diaria_cancelada' => 'Diaria Cancelada',
            'diaria_devolvida' => 'Diaria Devolvida',
            'diaria_dt_criacao' => 'Diaria Dt Criacao',
            'diaria_hr_criacao' => 'Diaria Hr Criacao',
            'diaria_justificativa_fds' => 'Diaria Justificativa Fds',
            'diaria_processo' => 'Diaria Processo',
            'diaria_empenho' => 'Diaria Empenho',
            'diaria_dt_empenho' => 'Diaria Dt Empenho',
            'diaria_excluida' => 'Diaria Excluida',
            'diaria_roteiro_complemento' => 'Diaria Roteiro Complemento',
            'diaria_comprovada' => 'Diaria Comprovada',
            'diaria_processo_fisico' => 'Diaria Processo Fisico',
            'diaria_empenho_pessoa_id' => 'Diaria Empenho DadosUnicoPessoa ID',
            'diaria_hr_empenho' => 'Diaria Hr Empenho',
            'diaria_extrato_empenho' => 'Diaria Extrato Empenho',
            'convenio_id' => 'Convenio ID',
            'indenizacao' => 'Indenizacao',
            'ger_id' => 'Ger ID',
            'diaria_local_solicitacao' => 'Diaria Local Solicitacao',
            'id_coordenadoria' => 'Id DiariaCoordenadoria',
            'data_viagem_saida' => 'Data Viagem Saida',
            'data_viagem_chegada' => 'Data Viagem Chegada',
            'super_sd' => 'Super Sd',
            'diaria_agrupada' => 'Diaria Agrupada',
            'imp_diaria_agrupa' => 'Imp Diaria Agrupa',
            'diaria_indvidual' => 'Diaria Indvidual',
            'diaria_dt_alteracao' => 'Diaria Dt Alteracao',
            'etapa_id' => 'Etapa ID',
            'pedido_empenho' => 'Pedido Empenho',
            'qtde_roteiros' => 'Qtde Roteiros',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaUnidadeCusto()
    {
        return $this->hasOne(DadosUnicoEstOrganizacional::className(), ['est_organizacional_id' => 'diaria_unidade_custo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaSolicitante()
    {
        return $this->hasOne(DadosUnicoPessoa::className(), ['pessoa_id' => 'diaria_solicitante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaBeneficiario()
    {
        return $this->hasOne(DadosUnicoPessoa::className(), ['pessoa_id' => 'diaria_beneficiario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcaoCd()
    {
        return $this->hasOne(DiariaAcao::className(), ['acao_cd' => 'acao_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFonteCd()
    {
        return $this->hasOne(DiariaFonte::className(), ['fonte_cd' => 'fonte_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeioTransporte()
    {
        return $this->hasOne(DiariaMeioTransporte::className(), ['meio_transporte_id' => 'meio_transporte_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjetoCd()
    {
        return $this->hasOne(DiariaProjeto::className(), ['projeto_cd' => 'projeto_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerritorioCd()
    {
        return $this->hasOne(DiariaTerritorio::className(), ['territorio_cd' => 'territorio_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaAprovacaos()
    {
        return $this->hasMany(DiariaDiariaAprovacao::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaArquivadas()
    {
        return $this->hasMany(DiariaDiariaArquivada::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaAutorizacaos()
    {
        return $this->hasMany(DiariaDiariaAutorizacao::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaCancelamentos()
    {
        return $this->hasMany(DiariaDiariaCancelamento::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaComprovacao()
    {
        return $this->hasOne(DiariaDiariaComprovacao::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaComprovacaoResumos()
    {
        return $this->hasMany(DiariaDiariaComprovacaoResumo::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaDevolucaos()
    {
        return $this->hasMany(DiariaDiariaDevolucao::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaLogs()
    {
        return $this->hasMany(DiariaDiariaLog::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaMotivos()
    {
        return $this->hasMany(DiariaMotivo::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotivos()
    {
        return $this->hasMany(Motivo::className(), ['motivo_id' => 'motivo_id'])->viaTable('diaria_motivo', ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaRoteiros()
    {
        return $this->hasMany(DiariaRoteiro::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaRoteiroComprovacaos()
    {
        return $this->hasMany(DiariaRoteiroComprovacao::className(), ['diaria_id' => 'diaria_id']);
    }

    public function getDiaDaSemana($data)
    {
        $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado');
        $dia = strftime("%w",strtotime($data));
        return $diasemana[$dia];
    }

    public function converterStringToData($_date = null) {
        $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
        if ($_date != null && preg_match($format, $_date, $partes)) {
            return $partes[3].'-'.$partes[2].'-'.$partes[1];
        }
        return false;
    }
}


