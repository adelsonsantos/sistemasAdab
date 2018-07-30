<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_local".
 *
 * @property int $vigilancia_fiscalizacao_local_id
 * @property string $vigilancia_fiscalizacao_local_nome
 * @property int $vigilancia_fiscalizacao_local_st
 */
class TermoVigilanciaFiscalizacaoLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_local_st'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_local_st'], 'integer'],
            [['vigilancia_fiscalizacao_local_nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_local_id' => 'Local ID',
            'vigilancia_fiscalizacao_local_nome' => 'Local',
            'vigilancia_fiscalizacao_local_st' => 'St',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoLocalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoLocalQuery(get_called_class());
    }
}
