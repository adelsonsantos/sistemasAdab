<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.funcao".
 *
 * @property int $funcao_id
 * @property string $funcao_ds
 * @property string $funcao_st
 * @property string $funcao_dt_criacao
 * @property string $funcao_dt_alteracao
 */
class DadosUnicoFuncao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.funcao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['funcao_ds'], 'required'],
            [['funcao_st'], 'number'],
            [['funcao_dt_criacao', 'funcao_dt_alteracao'], 'safe'],
            [['funcao_ds'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'funcao_id' => 'Funcao ID',
            'funcao_ds' => 'Funcao Ds',
            'funcao_st' => 'Funcao St',
            'funcao_dt_criacao' => 'Funcao Dt Criacao',
            'funcao_dt_alteracao' => 'Funcao Dt Alteracao',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosUnicoFuncaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosUnicoFuncaoQuery(get_called_class());
    }
}
