<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_atividade".
 *
 * @property int $vigilancia_fiscalizacao_atividade_id
 * @property string $vigilancia_fiscalizacao_atividade_nome
 * @property int $vigilancia_fiscalizacao_atividade_st
 */
class TermoVigilanciaFiscalizacaoAtividade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_atividade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_atividade_st'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_atividade_st'], 'integer'],
            [['vigilancia_fiscalizacao_atividade_nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_atividade_id' => 'ID',
            'vigilancia_fiscalizacao_atividade_nome' => 'Nome',
            'vigilancia_fiscalizacao_atividade_st' => 'St',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAtividadeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoAtividadeQuery(get_called_class());
    }
}
