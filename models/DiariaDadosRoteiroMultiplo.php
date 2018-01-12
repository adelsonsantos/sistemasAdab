<?php

namespace app\models;

/**
 * This is the model class for table "diaria.dados_roteiro_multiplo".
 *
 * @property integer $dados_roteiro_id
 * @property integer $diaria_id
 * @property string $diaria_dt_saida
 * @property string $diaria_hr_saida
 * @property string $diaria_dt_chegada
 * @property string $diaria_hr_chegada
 * @property string $diaria_qtde
 * @property string $diaria_desconto
 * @property string $diaria_valor
 * @property string $diaria_roteiro_complemento
 * @property integer $controle_roteiro
 * @property integer $dados_roteiro_status
 */
class DiariaDadosRoteiroMultiplo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.dados_roteiro_multiplo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'diaria_dt_saida', 'diaria_hr_saida', 'diaria_dt_chegada', 'diaria_hr_chegada', 'diaria_qtde', 'diaria_desconto', 'diaria_valor', 'controle_roteiro'], 'required'],
            [['diaria_id', 'controle_roteiro', 'dados_roteiro_status'], 'integer'],
            [['diaria_dt_saida', 'diaria_hr_saida', 'diaria_dt_chegada', 'diaria_hr_chegada'], 'string', 'max' => 10],
            [['diaria_qtde'], 'string', 'max' => 4],
            [['diaria_desconto'], 'string', 'max' => 1],
            [['diaria_valor'], 'string', 'max' => 20],
            [['diaria_roteiro_complemento'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dados_roteiro_id' => 'Dados Roteiro ID',
            'diaria_id' => 'Diaria ID',
            'diaria_dt_saida' => 'Diaria Dt Saida',
            'diaria_hr_saida' => 'Diaria Hr Saida',
            'diaria_dt_chegada' => 'Diaria Dt Chegada',
            'diaria_hr_chegada' => 'Diaria Hr Chegada',
            'diaria_qtde' => 'Diaria Qtde',
            'diaria_desconto' => '',
            'diaria_valor' => 'Diaria Valor',
            'diaria_roteiro_complemento' => 'Diaria Roteiro Complemento',
            'controle_roteiro' => 'Controle Roteiro',
            'dados_roteiro_status' => 'Dados Roteiro Status'
        ];
    }
}
