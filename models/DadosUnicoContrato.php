<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.contrato".
 *
 * @property int $contrato_id
 * @property int $pessoa_id
 * @property string $contrato_num
 * @property string $contrato_ds
 * @property string $contrato_dt_inicio
 * @property string $contrato_dt_termino
 * @property string $contrato_valor
 * @property string $contrato_st
 * @property string $contrato_dt_criacao
 * @property string $contrato_dt_alteracao
 * @property int $contrato_num_max
 * @property int $contrato_tipo_id
 */
class DadosUnicoContrato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.contrato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id'], 'required'],
            [['pessoa_id', 'contrato_num_max', 'contrato_tipo_id'], 'default', 'value' => null],
            [['pessoa_id', 'contrato_num_max', 'contrato_tipo_id'], 'integer'],
            [['contrato_st'], 'number'],
            [['contrato_dt_criacao', 'contrato_dt_alteracao'], 'safe'],
            [['contrato_num', 'contrato_dt_inicio', 'contrato_dt_termino'], 'string', 'max' => 10],
            [['contrato_ds'], 'string', 'max' => 50],
            [['contrato_valor'], 'string', 'max' => 15],
            [['contrato_tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoContratoTipo::className(), 'targetAttribute' => ['contrato_tipo_id' => 'contrato_tipo_id']],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoaJuridica::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contrato_id' => 'Contrato ID',
            'pessoa_id' => 'Pessoa ID',
            'contrato_num' => 'Contrato Num',
            'contrato_ds' => 'Contrato Ds',
            'contrato_dt_inicio' => 'Contrato Dt Inicio',
            'contrato_dt_termino' => 'Contrato Dt Termino',
            'contrato_valor' => 'Contrato Valor',
            'contrato_st' => 'Contrato St',
            'contrato_dt_criacao' => 'Contrato Dt Criacao',
            'contrato_dt_alteracao' => 'Contrato Dt Alteracao',
            'contrato_num_max' => 'Contrato Num Max',
            'contrato_tipo_id' => 'Contrato Tipo ID',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosUnicoContratoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosUnicoContratoQuery(get_called_class());
    }
}
