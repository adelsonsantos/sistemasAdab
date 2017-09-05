<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.dados_roteiro_multiplo_comprovacao".
 *
 * @property integer $dados_roteiro_comprovacao_id
 * @property integer $diaria_id
 * @property string $diaria_comprovacao_dt_saida
 * @property string $diaria_comprovacao_hr_saida
 * @property string $diaria_comprovacao_dt_chegada
 * @property string $diaria_comprovacao_hr_chegada
 * @property string $diaria_comprovacao_qtde
 * @property string $diaria_comprovacao_desconto
 * @property string $diaria_comprovacao_valor
 * @property string $diaria_roteiro_comprovacao_complemento
 * @property string $diaria_resumo_comprovacao
 * @property integer $controle_roteiro_comprovacao
 * @property integer $dados_roteiro_comprovacao_status
 * @property string $diaria_comprovacao_saldo
 * @property string $diaria_comprovacao_saldo_tipo
 */
class DiariaDadosRoteiroMultiploComprovacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.dados_roteiro_multiplo_comprovacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'diaria_comprovacao_dt_saida', 'diaria_comprovacao_hr_saida', 'diaria_comprovacao_dt_chegada', 'diaria_comprovacao_hr_chegada', 'diaria_comprovacao_qtde', 'diaria_comprovacao_desconto', 'diaria_comprovacao_valor', 'controle_roteiro_comprovacao'], 'required'],
            [['diaria_id', 'controle_roteiro_comprovacao', 'dados_roteiro_comprovacao_status'], 'integer'],
            [['diaria_resumo_comprovacao'], 'string'],
            [['diaria_comprovacao_dt_saida', 'diaria_comprovacao_hr_saida', 'diaria_comprovacao_dt_chegada', 'diaria_comprovacao_hr_chegada'], 'string', 'max' => 10],
            [['diaria_comprovacao_qtde'], 'string', 'max' => 4],
            [['diaria_comprovacao_desconto', 'diaria_comprovacao_saldo_tipo'], 'string', 'max' => 1],
            [['diaria_comprovacao_valor', 'diaria_comprovacao_saldo'], 'string', 'max' => 20],
            [['diaria_roteiro_comprovacao_complemento'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dados_roteiro_comprovacao_id' => 'Dados Roteiro Comprovacao ID',
            'diaria_id' => 'Diaria ID',
            'diaria_comprovacao_dt_saida' => 'Diaria Comprovacao Dt Saida',
            'diaria_comprovacao_hr_saida' => 'Diaria Comprovacao Hr Saida',
            'diaria_comprovacao_dt_chegada' => 'Diaria Comprovacao Dt Chegada',
            'diaria_comprovacao_hr_chegada' => 'Diaria Comprovacao Hr Chegada',
            'diaria_comprovacao_qtde' => 'Diaria Comprovacao Qtde',
            'diaria_comprovacao_desconto' => 'Diaria Comprovacao Desconto',
            'diaria_comprovacao_valor' => 'Diaria Comprovacao Valor',
            'diaria_roteiro_comprovacao_complemento' => 'Diaria Roteiro Comprovacao Complemento',
            'diaria_resumo_comprovacao' => 'Diaria Resumo Comprovacao',
            'controle_roteiro_comprovacao' => 'Controle Roteiro Comprovacao',
            'dados_roteiro_comprovacao_status' => 'Dados Roteiro Comprovacao Status',
            'diaria_comprovacao_saldo' => 'Diaria Comprovacao Saldo',
            'diaria_comprovacao_saldo_tipo' => 'Diaria Comprovacao Saldo Tipo',
        ];
    }
}
