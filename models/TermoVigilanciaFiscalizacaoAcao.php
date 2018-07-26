<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_acao".
 *
 * @property int $vigilancia_fiscalizacao_acao_id
 * @property string $vigilancia_fiscalizacao_acao_nome
 * @property int $vigilancia_fiscalizacao_acao_st
 * @property int $vigilancia_fiscalizacao_acao_cmp_complentar
 */
class TermoVigilanciaFiscalizacaoAcao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_acao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_acao_st', 'vigilancia_fiscalizacao_acao_cmp_complentar'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_acao_st', 'vigilancia_fiscalizacao_acao_cmp_complentar'], 'integer'],
            [['vigilancia_fiscalizacao_acao_nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_acao_id' => 'Vigilancia Fiscalizacao Acao ID',
            'vigilancia_fiscalizacao_acao_nome' => 'Vigilancia Fiscalizacao Acao Nome',
            'vigilancia_fiscalizacao_acao_st' => 'Vigilancia Fiscalizacao Acao St',
            'vigilancia_fiscalizacao_acao_cmp_complentar' => 'Vigilancia Fiscalizacao Acao Cmp Complentar',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAcaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoAcaoQuery(get_called_class());
    }
}
