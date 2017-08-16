<?php

namespace app\models;

/**
 * This is the model class for table "diaria.diaria_comprovacao".
 *
 * @property integer $diaria_id
 * @property integer $diaria_comprovacao_comprovador
 * @property string $diaria_comprovacao_dt_saida
 * @property string $diaria_comprovacao_hr_saida
 * @property string $diaria_comprovacao_dt_chegada
 * @property string $diaria_comprovacao_hr_chegada
 * @property string $diaria_comprovacao_valor_ref
 * @property string $diaria_comprovacao_desconto
 * @property string $diaria_comprovacao_qtde
 * @property string $diaria_comprovacao_valor
 * @property string $diaria_comprovacao_justificativa_feriado
 * @property string $diaria_comprovacao_justificativa_fds
 * @property string $diaria_comprovacao_saldo
 * @property string $diaria_comprovacao_saldo_tipo
 * @property string $diaria_comprovacao_dt
 * @property string $diaria_comprovacao_hr
 * @property integer $diaria_comprovacao_st
 * @property string $diaria_comprovacao_empenho
 * @property string $diaria_comprovacao_dt_empenho
 * @property string $diaria_comprovacao_resumo
 * @property string $diaria_comprovacao_complemento
 * @property string $diaria_comprovacao_complemento_justificativa
 * @property string $diaria_comprovacao_relatorio
 * @property integer $diaria_comprovacao_controle
 *
 * @property DadosUnicoPessoa $diariaComprovacaoComprovador
 * @property Diarias $diaria
 */
class DiariaComprovacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.diaria_comprovacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'diaria_comprovacao_comprovador', 'diaria_comprovacao_dt_saida', 'diaria_comprovacao_hr_saida', 'diaria_comprovacao_dt_chegada', 'diaria_comprovacao_hr_chegada', 'diaria_comprovacao_valor_ref', 'diaria_comprovacao_desconto', 'diaria_comprovacao_qtde', 'diaria_comprovacao_valor', 'diaria_comprovacao_dt', 'diaria_comprovacao_hr'], 'required'],
            [['diaria_id', 'diaria_comprovacao_comprovador', 'diaria_comprovacao_st', 'diaria_comprovacao_controle'], 'integer'],
            [['diaria_comprovacao_dt', 'diaria_comprovacao_dt_empenho'], 'safe'],
            [['diaria_comprovacao_resumo'], 'string'],
            [['diaria_comprovacao_complemento'], 'number'],
            [['diaria_comprovacao_dt_saida', 'diaria_comprovacao_hr_saida', 'diaria_comprovacao_dt_chegada', 'diaria_comprovacao_hr_chegada', 'diaria_comprovacao_valor_ref', 'diaria_comprovacao_hr'], 'string', 'max' => 10],
            [['diaria_comprovacao_desconto', 'diaria_comprovacao_saldo_tipo'], 'string', 'max' => 1],
            [['diaria_comprovacao_qtde'], 'string', 'max' => 4],
            [['diaria_comprovacao_valor', 'diaria_comprovacao_saldo'], 'string', 'max' => 20],
            [['diaria_comprovacao_justificativa_feriado', 'diaria_comprovacao_justificativa_fds', 'diaria_comprovacao_complemento_justificativa', 'diaria_comprovacao_relatorio'], 'string', 'max' => 255],
            [['diaria_comprovacao_empenho'], 'string', 'max' => 30],
            [['diaria_comprovacao_comprovador'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['diaria_comprovacao_comprovador' => 'pessoa_id']],
            [['diaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diarias::className(), 'targetAttribute' => ['diaria_id' => 'diaria_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diaria_id' => 'Diaria ID',
            'diaria_comprovacao_comprovador' => 'Diaria Comprovacao Comprovador',
            'diaria_comprovacao_dt_saida' => 'Diaria Comprovacao Dt Saida',
            'diaria_comprovacao_hr_saida' => 'Diaria Comprovacao Hr Saida',
            'diaria_comprovacao_dt_chegada' => 'Diaria Comprovacao Dt Chegada',
            'diaria_comprovacao_hr_chegada' => 'Diaria Comprovacao Hr Chegada',
            'diaria_comprovacao_valor_ref' => 'Diaria Comprovacao Valor Ref',
            'diaria_comprovacao_desconto' => 'Diaria Comprovacao Desconto',
            'diaria_comprovacao_qtde' => 'Diaria Comprovacao Qtde',
            'diaria_comprovacao_valor' => 'Diaria Comprovacao Valor',
            'diaria_comprovacao_justificativa_feriado' => 'Diaria Comprovacao Justificativa Feriado',
            'diaria_comprovacao_justificativa_fds' => 'Diaria Comprovacao Justificativa Fds',
            'diaria_comprovacao_saldo' => 'Diaria Comprovacao Saldo',
            'diaria_comprovacao_saldo_tipo' => 'Diaria Comprovacao Saldo Tipo',
            'diaria_comprovacao_dt' => 'Diaria Comprovacao Dt',
            'diaria_comprovacao_hr' => 'Diaria Comprovacao Hr',
            'diaria_comprovacao_st' => 'Diaria Comprovacao St',
            'diaria_comprovacao_empenho' => 'Diaria Comprovacao Empenho',
            'diaria_comprovacao_dt_empenho' => 'Diaria Comprovacao Dt Empenho',
            'diaria_comprovacao_resumo' => 'Diaria Comprovacao Resumo',
            'diaria_comprovacao_complemento' => 'Diaria Comprovacao Complemento',
            'diaria_comprovacao_complemento_justificativa' => 'Diaria Comprovacao Complemento Justificativa',
            'diaria_comprovacao_relatorio' => 'Diaria Comprovacao Relatorio',
            'diaria_comprovacao_controle' => 'Diaria Comprovacao Controle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaComprovacaoComprovador()
    {
        return $this->hasOne(DadosUnicoPessoa::className(), ['pessoa_id' => 'diaria_comprovacao_comprovador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaria()
    {
        return $this->hasOne(Diarias::className(), ['diaria_id' => 'diaria_id']);
    }
}
