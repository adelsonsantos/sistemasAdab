<?php

namespace app\models;

/**
 * This is the model class for table "diaria.diaria_financeiro".
 *
 * @property integer $diaria_financeiro_id
 * @property integer $diaria_id
 * @property integer $diaria_financeiro_preliquidante
 * @property string $diaria_financeiro_dt_obrigacao
 * @property string $diaria_financeiro_hr_obrigacao
 * @property string $diaria_preliquidacao_dt
 * @property string $diaria_preliquidacao_hr
 * @property integer $diaria_financeiro_liquidante
 * @property string $diaria_liquidacao_dt
 * @property string $diaria_liquidacao_hr
 * @property string $diaria_financeiro_dt_execucao
 * @property integer $diaria_financeiro_executante
 * @property string $diaria_execucao_dt
 * @property string $diaria_execucao_hr
 */
class DiariaFinanceiro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.diaria_financeiro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'diaria_financeiro_preliquidante', 'diaria_financeiro_dt_obrigacao', 'diaria_financeiro_hr_obrigacao', 'diaria_preliquidacao_dt', 'diaria_preliquidacao_hr'], 'required'],
            [['diaria_id', 'diaria_financeiro_preliquidante', 'diaria_financeiro_liquidante', 'diaria_financeiro_executante'], 'integer'],
            [['diaria_financeiro_dt_obrigacao', 'diaria_preliquidacao_dt', 'diaria_liquidacao_dt', 'diaria_financeiro_dt_execucao', 'diaria_execucao_dt'], 'safe'],
            [['diaria_financeiro_hr_obrigacao', 'diaria_preliquidacao_hr', 'diaria_liquidacao_hr', 'diaria_execucao_hr'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diaria_financeiro_id' => 'Diaria Financeiro ID',
            'diaria_id' => 'Diaria ID',
            'diaria_financeiro_preliquidante' => 'Diaria Financeiro Preliquidante',
            'diaria_financeiro_dt_obrigacao' => 'Diaria Financeiro Dt Obrigacao',
            'diaria_financeiro_hr_obrigacao' => 'Diaria Financeiro Hr Obrigacao',
            'diaria_preliquidacao_dt' => 'Diaria Preliquidacao Dt',
            'diaria_preliquidacao_hr' => 'Diaria Preliquidacao Hr',
            'diaria_financeiro_liquidante' => 'Diaria Financeiro Liquidante',
            'diaria_liquidacao_dt' => 'Diaria Liquidacao Dt',
            'diaria_liquidacao_hr' => 'Diaria Liquidacao Hr',
            'diaria_financeiro_dt_execucao' => 'Diaria Financeiro Dt Execucao',
            'diaria_financeiro_executante' => 'Diaria Financeiro Executante',
            'diaria_execucao_dt' => 'Diaria Execucao Dt',
            'diaria_execucao_hr' => 'Diaria Execucao Hr',
        ];
    }
}
