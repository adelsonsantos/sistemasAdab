<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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
 * @property integer AUTORIZACAO
 * @property integer APROVACAO
 * @property integer EMPENHO
 * @property integer EXECUCAO
 * @property integer COMPROVACAO
 * @property integer APROVACAO_DE_COMPROVACAO
 * @property integer AGUARDANDO_ARQUIVAMENTO
 * @property integer ARQUIVADA
 * @property integer PRE_AUTORIZAR
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
    const AUTORIZACAO               = 0;
    const APROVACAO                 = 1;
    const EMPENHO                   = 2;
    const EXECUCAO                  = 3;
    const COMPROVACAO               = 4;
    const APROVACAO_DE_COMPROVACAO  = 5;
    const AGUARDANDO_ARQUIVAMENTO   = 6;
    const ARQUIVADA                 = 7;
    const PRE_AUTORIZAR             = 100;

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
            [['diaria_numero', 'diaria_solicitante', 'diaria_beneficiario', 'diaria_dt_saida', 'diaria_hr_saida', 'diaria_dt_chegada', 'diaria_hr_chegada', 'diaria_valor_ref', 'diaria_qtde', 'diaria_valor', 'meio_transporte_id', 'diaria_descricao', 'diaria_unidade_custo', 'projeto_cd', 'acao_cd', 'territorio_cd', 'fonte_cd', 'diaria_dt_criacao', 'diaria_hr_criacao'], 'required'],
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
            'diaria_id' => 'Dia da Semana',
            'diaria_numero' => 'Diaria Numero',
            'diaria_solicitante' => 'Diaria Solicitante',
            'diaria_beneficiario' => 'Diaria Beneficiario',
            'diaria_dt_saida' => 'Data',
            'diaria_hr_saida' => 'Hora',
            'diaria_dt_chegada' => 'Data',
            'diaria_hr_chegada' => 'Hora',
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
            'diaria_empenho' => 'Liberar Empenho',
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

    public function getId()
    {
        return $this->diaria_id;
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
    public function getDiariaStatus()
    {
        return $this->hasOne(DiariaStatus::className(), ['status_id' => 'diaria_st']);
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
        if(!is_null($data)){
        $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado');
        $dia = strftime("%w",strtotime($data));
            if (!empty($diasemana)) {
                return $diasemana[$dia];
            }
        }
    }

    public function converterStringToData($_date = null) {
        $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
        if ($_date != null && preg_match($format, $_date, $partes)) {
            return $partes[3].'-'.$partes[2].'-'.$partes[1];
        }
        return false;
    }

    public function getHistoricoSolicitacao()
    {
        $date=date_create($this->diaria_dt_criacao);
        $hora=date_create($this->diaria_hr_criacao);

        $arrayHistoricoSolicitacao = [
          'nome'  => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $this->diaria_solicitante])->all(), 'pessoa_nm', 'pessoa_nm'), ['class'=>'form-control col-sm-1']),
          'data'  => date_format($date,"d/m/Y"),
          'hora'  => date_format($hora,"H:i:s"),
          'status'=> 'Solicitação'
        ];
        return $arrayHistoricoSolicitacao;
    }

    public function getHistoricoPreAutorizar()
    {
        $arrayHistoricoPreAutorizacao = DiariaPreAutorizacao::find()->asArray()->innerJoinWith('funcionario')->where(['diaria_id' => $this->diaria_id])->orderBy(['diaria_pre_autorizacao_id'=>SORT_DESC])->limit(1)->all();
        if(!empty($arrayHistoricoPreAutorizacao)) {
            $date=date_create($arrayHistoricoPreAutorizacao[0]['diaria_pre_autorizacao_dt']);
            $hora=date_create($arrayHistoricoPreAutorizacao[0]['diaria_pre_autorizacao_hr']);
            return $arrayHistoricoPreAutorizacao = [
                    'nome' => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $arrayHistoricoPreAutorizacao[0]['funcionario']['pessoa_id']])->all(), 'pessoa_nm', 'pessoa_nm'), ['class' => 'form-control col-sm-1']),
                    'data' => date_format($date, "d/m/Y"),
                    'hora' => date_format($hora, "H:i:s"),
                    'status' => 'Pré-Autorização'
                ];
        }
    }

    public function getHistoricoAutorizacao()
    {
        $arrayAutorizacao = DiariaAutorizacao::find()->innerJoinWith('funcionario')->asArray()->where(['diaria_id' => $this->diaria_id])->orderBy(['diaria_autorizacao_id'=>SORT_DESC])->limit(1)->all();
        if(!empty($arrayAutorizacao)){
            $date=date_create($arrayAutorizacao[0]['diaria_autorizacao_dt']);
            $hora=date_create($arrayAutorizacao[0]['diaria_autorizacao_hr']);
            $arrayAutorizacao[0]['pessoa_id'];
            return $arrayHistoricoAutorizacao = [
                        'nome' => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $arrayAutorizacao[0]['funcionario']['pessoa_id']])->all(), 'pessoa_nm', 'pessoa_nm'), ['class' => 'form-control col-sm-1']),
                        'data' => date_format($date, "d/m/Y"),
                        'hora' => date_format($hora, "H:i:s"),
                        'status' => 'Autorização'
                    ];
        }
    }

    public function getHistoricoAprovador()
    {
        $arrayAprovacao = DiariaAprovacao::find()->asArray()->innerJoinWith('funcionario')->where(['diaria_id' => $this->diaria_id])->orderBy(['diaria_aprovacao_id'=>SORT_ASC])->limit(1)->all();
        if(!empty($arrayAprovacao)){
            $date=date_create($arrayAprovacao[0]['diaria_aprovacao_dt']);
            $hora=date_create($arrayAprovacao[0]['diaria_aprovacao_hr']);
            return  $arrayHistoricoAprovador = [
                    'nome'  => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $arrayAprovacao[0]['funcionario']['pessoa_id']])->all(), 'pessoa_nm', 'pessoa_nm'), ['class'=>'form-control col-sm-1']),
                    'data'  => date_format($date,"d/m/Y"),
                    'hora'  => date_format($hora,"H:i:s"),
                    'status'=> 'Aprovação'
                ];
        }
    }

    public function getHistoricoEmpenho()
    {
        if (!empty($this->diaria_dt_empenho)) {
            $date = date_create($this->diaria_dt_empenho);
            $hora = date_create($this->diaria_hr_empenho);
            $arrayHistoricoSolicitacao = [
                'nome' => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $this->diaria_empenho_pessoa_id])->all(), 'pessoa_nm', 'pessoa_nm'), ['class' => 'form-control col-sm-1']),
                'data' => date_format($date, "d/m/Y"),
                'hora' => date_format($hora, "H:i:s"),
                'status' => 'Empenho'
            ];
            return $arrayHistoricoSolicitacao;
        }
    }

    public function getHistoricoPreLiquidacao()
    {
            $arrayPreLiquidacao = DiariaFinanceiro::find()->asArray()->innerJoinWith('funcionario')->where(['diaria_id' => $this->diaria_id])->orderBy(['diaria_financeiro_id'=>SORT_DESC])->limit(1)->all();
            if(!empty($arrayPreLiquidacao)) {
                $date = date_create($arrayPreLiquidacao[0]['diaria_liquidacao_dt']);
                $hora = date_create($arrayPreLiquidacao[0]['diaria_liquidacao_hr']);
                return $arrayHistoricoPreLiquidacao = [
                        'nome' => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $arrayPreLiquidacao[0]['funcionario']['pessoa_id']])->all(), 'pessoa_nm', 'pessoa_nm'), ['class' => 'form-control col-sm-1']),
                        'data' => date_format($date, "d/m/Y"),
                        'hora' => date_format($hora, "H:i:s"),
                        'status' => 'Pré-Liquidação'
                    ];
            }
    }

    public function getHistoricoLiquidacao()
    {
            $arrayLiquidacao = DiariaFinanceiro::find()->asArray()->innerJoinWith('funcionario')->where(['diaria_id' => $this->diaria_id])->orderBy(['diaria_financeiro_id'=>SORT_DESC])->limit(1)->all();
        if(!empty($arrayLiquidacao)) {
            $date = date_create($arrayLiquidacao[0]['diaria_liquidacao_dt']);
            $hora = date_create($arrayLiquidacao[0]['diaria_liquidacao_hr']);
            return
                $arrayHistoricoLiquidacao = [
                    'nome' => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $arrayLiquidacao[0]['funcionario']['pessoa_id']])->all(), 'pessoa_nm', 'pessoa_nm'), ['class' => 'form-control col-sm-1']),
                    'data' => date_format($date, "d/m/Y"),
                    'hora' => date_format($hora, "H:i:s"),
                    'status' => 'Liquidação'
                ];
        }
    }

    public function getHistoricoExecucao()
    {
            $arrayHistoricoExecucao = DiariaFinanceiro::find()->asArray()->innerJoinWith('funcionario')->where(['diaria_id' => $this->diaria_id])->orderBy(['diaria_financeiro_id'=>SORT_DESC])->limit(1)->all();
            if (!empty($arrayHistoricoExecucao)) {
            $date = date_create($arrayHistoricoExecucao[0]['diaria_execucao_dt']);
            $hora = date_create($arrayHistoricoExecucao[0]['diaria_execucao_hr']);

            return $arrayHistoricoExecucao = [
                'nome' => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $arrayHistoricoExecucao[0]['funcionario']['pessoa_id']])->all(), 'pessoa_nm', 'pessoa_nm')),
                'data' => date_format($date, "d/m/Y"),
                'hora' => date_format($hora, "H:i:s"),
                'status' => 'Execução'
            ];
        }
    }

    public function getHistoricoComprovacao()
    {
        $arrayComprovacao = DiariaComprovacao::find()->asArray()->where(['diaria_id' => $this->diaria_id])->orderBy(['diaria_id'=>SORT_DESC])->limit(1)->all();
        if (!empty($arrayComprovacao)) {
            $date = date_create($arrayComprovacao[0]['diaria_comprovacao_dt']);
            $hora = date_create($arrayComprovacao[0]['diaria_comprovacao_hr']);
            return $arrayHistoricoSolicitacao = [
                'nome' => implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $arrayComprovacao[0]['diaria_comprovacao_comprovador']])->all(), 'pessoa_nm', 'pessoa_nm')),
                'data' => date_format($date, "d/m/Y"),
                'hora' => date_format($hora, "H:i:s"),
                'status' => 'Comprovação'
            ];
        }
    }
    public function getHistoricoCompleto()
    {
        $arrayHistorico = [];
        !empty($this->getHistoricoComprovacao())    ?   array_push($arrayHistorico, $this->getHistoricoComprovacao())   : null;
        !empty($this->getHistoricoExecucao())       ?   array_push($arrayHistorico, $this->getHistoricoExecucao())      : null;
        !empty($this->getHistoricoLiquidacao())     ?   array_push($arrayHistorico, $this->getHistoricoLiquidacao())    : null;
        !empty($this->getHistoricoPreLiquidacao())  ?   array_push($arrayHistorico, $this->getHistoricoPreLiquidacao()) : null;
        !empty($this->getHistoricoEmpenho())        ?   array_push($arrayHistorico, $this->getHistoricoEmpenho())       : null;
        !empty($this->getHistoricoAprovador())      ?   array_push($arrayHistorico, $this->getHistoricoAprovador())     : null;
        !empty($this->getHistoricoAutorizacao())    ?   array_push($arrayHistorico, $this->getHistoricoAutorizacao())   : null;
        !empty($this->getHistoricoPreAutorizar())   ?   array_push($arrayHistorico, $this->getHistoricoPreAutorizar())  : null;
        !empty($this->getHistoricoSolicitacao())    ?   array_push($arrayHistorico, $this->getHistoricoSolicitacao())   : null;
        return $arrayHistorico;
    }

    public $munici;

    public function setMunici($munici)
    {
        $this->munici = $munici;
    }

    public function getCoordenadoriaDoUsuario($index = 38490)
    {
        switch ($index){
            case 1 : $municipio = 38210;
            break;
            default : $municipio = 38490;
            break;
        }
        return $municipio;
    }

    public function getDadosBancarios($userId)
    {
      $banco = implode(ArrayHelper::map(DadosUnicoDadosBancarios::find()->innerJoinWith('banco')->where(['pessoa_id' => $userId])->all(), 'banco.banco_cd', 'banco.banco_cd'));
      $agencia = implode(ArrayHelper::map(DadosUnicoDadosBancarios::find()->where(['pessoa_id' => $userId])->all(), 'dados_bancarios_agencia', 'dados_bancarios_agencia'));
      $tipoConta = implode(ArrayHelper::map(DadosUnicoDadosBancarios::find()->where(['pessoa_id' => $userId])->all(), 'dados_bancarios_conta_tipo', 'dados_bancarios_conta_tipo'));
      $conta = implode(ArrayHelper::map(DadosUnicoDadosBancarios::find()->where(['pessoa_id' => $userId])->all(), 'dados_bancarios_conta', 'dados_bancarios_conta'));

      return "Banco: {$banco} - Agência: {$agencia} - C{$tipoConta}. {$conta}";
    }

    public function getEndereco($userId)
    {
        $endereco = implode(ArrayHelper::map(DadosUnicoEndereco::find()->where(['pessoa_id' => $userId])->all(), 'endereco_ds', 'endereco_ds'));
        $enderecoNumero = implode(ArrayHelper::map(DadosUnicoEndereco::find()->where(['pessoa_id' => $userId])->all(), 'endereco_num', 'endereco_num'));
        $bairro = implode(ArrayHelper::map(DadosUnicoEndereco::find()->where(['pessoa_id' => $userId])->all(), 'endereco_bairro', 'endereco_bairro'));
        $estado = implode(ArrayHelper::map(DadosUnicoEndereco::find()->innerJoinWith('estadoUf')->where(['pessoa_id' => $userId])->all(), 'estadoUf.estado_uf', 'estadoUf.estado_uf'));
        $municipio = implode(ArrayHelper::map(DadosUnicoEndereco::find()->innerJoinWith('municipioCd')->where(['pessoa_id' => $userId])->all(), 'municipioCd.municipio_ds', 'municipioCd.municipio_ds'));

        return "{$endereco}, {$enderecoNumero}, {$bairro}, {$municipio} - {$estado}";
    }

    public function getRoteiroMontarProcesso($id, $controle_roteiro = null)
    {
        $origem = DiariaRoteiro::find()->where(['diaria_id' => $id])->andWhere(['controle_roteiro' => $controle_roteiro])->orderBy(['roteiro_id' => SORT_ASC])->one();
        $orgiemRotaUf = implode(ArrayHelper::map(DadosUnicoMunicipio::find()->where(['municipio_cd' => $origem['roteiro_origem']])->all(), 'estado_uf', 'estado_uf'));
        $orgiemRotaMunicipio = implode(ArrayHelper::map(DadosUnicoMunicipio::find()->where(['municipio_cd' => $origem['roteiro_origem']])->all(), 'municipio_ds', 'municipio_ds'));
        $destino = ArrayHelper::map(DiariaRoteiro::find()->where(['diaria_id' => $id])->andWhere(['controle_roteiro' => $controle_roteiro])->orderBy(['roteiro_id' => SORT_ASC])->all(), 'roteiro_destino', 'roteiro_destino');

        $array = [
            [
                'uf' => $orgiemRotaUf,
                'municipio' => $orgiemRotaMunicipio
            ]
        ];

        foreach ($destino as $value){
            $uf = implode(ArrayHelper::map(DadosUnicoMunicipio::find()->where(['municipio_cd' => $value])->all(), 'estado_uf', 'estado_uf'));
            $municipio = implode(ArrayHelper::map(DadosUnicoMunicipio::find()->where(['municipio_cd' => $value])->all(), 'municipio_ds', 'municipio_ds'));

            $arrrayRota = [
                'uf' => $uf,
                'municipio' => $municipio
            ];

            array_push($array, $arrrayRota);
        }
        return $array;
    }

    public function getRoteiroMontarProcessoUnico($id)
    {
        $origem = DiariaRoteiro::find()->where(['diaria_id' => $id])->orderBy(['roteiro_id' => SORT_ASC])->one();
        $orgiemRotaUf = implode(ArrayHelper::map(DadosUnicoMunicipio::find()->where(['municipio_cd' => $origem['roteiro_origem']])->all(), 'estado_uf', 'estado_uf'));
        $orgiemRotaMunicipio = implode(ArrayHelper::map(DadosUnicoMunicipio::find()->where(['municipio_cd' => $origem['roteiro_origem']])->all(), 'municipio_ds', 'municipio_ds'));
        $destino = ArrayHelper::map(DiariaRoteiro::find()->where(['diaria_id' => $id])->orderBy(['roteiro_id' => SORT_ASC])->all(), 'roteiro_destino', 'roteiro_destino');

        $array = [
            [
                'uf' => $orgiemRotaUf,
                'municipio' => $orgiemRotaMunicipio
            ]
        ];

        foreach ($destino as $value){
            $uf = implode(ArrayHelper::map(DadosUnicoMunicipio::find()->where(['municipio_cd' => $value])->all(), 'estado_uf', 'estado_uf'));
            $municipio = implode(ArrayHelper::map(DadosUnicoMunicipio::find()->where(['municipio_cd' => $value])->all(), 'municipio_ds', 'municipio_ds'));

            $arrrayRota = [
                'uf' => $uf,
                'municipio' => $municipio
            ];

            array_push($array, $arrrayRota);
        }
        return $array;
    }
}


