<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_status".
 *
 * @property int $vigilancia_fiscalizacao_status_id
 * @property string $vigilancia_fiscalizacao_status_nome
 * @property int $vigilancia_fiscalizacao_status_st
 */
class TermoVigilanciaFiscalizacaoStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_status_st'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_status_st'], 'integer'],
            [['vigilancia_fiscalizacao_status_nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_status_id' => 'ID',
            'vigilancia_fiscalizacao_status_nome' => 'Nome',
            'vigilancia_fiscalizacao_status_st' => 'St',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoStatusQuery(get_called_class());
    }
}
