<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.estado_civil".
 *
 * @property int $estado_civil_id
 * @property string $estado_civil_ds
 * @property string $estado_civil_st
 * @property string $estado_civil_dt_criacao
 * @property string $estado_civil_dt_alteracao
 */
class DadosUnicoEstadoCivil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.estado_civil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_civil_st'], 'number'],
            [['estado_civil_dt_criacao', 'estado_civil_dt_alteracao'], 'safe'],
            [['estado_civil_ds'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estado_civil_id' => 'Estado Civil ID',
            'estado_civil_ds' => 'Estado Civil Ds',
            'estado_civil_st' => 'Estado Civil St',
            'estado_civil_dt_criacao' => 'Estado Civil Dt Criacao',
            'estado_civil_dt_alteracao' => 'Estado Civil Dt Alteracao',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosunicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosunicoQuery(get_called_class());
    }
}
