<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_proprietario".
 *
 * @property int $vigilancia_fiscalizacao_proprietario_id
 * @property int $vigilancia_fiscalizacao_proprietario_tipo_id
 * @property string $vigilancia_fiscalizacao_proprietario_cpf
 * @property string $vigilancia_fiscalizacao_proprietario_cnpj
 * @property string $vigilancia_fiscalizacao_proprietario_svo
 */
class TermoVigilanciaFiscalizacaoProprietario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_proprietario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_proprietario_tipo_id'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_proprietario_tipo_id'], 'integer'],
            [['vigilancia_fiscalizacao_proprietario_cpf'], 'string', 'max' => 14],
            [['vigilancia_fiscalizacao_proprietario_cnpj'], 'string', 'max' => 18],
            [['vigilancia_fiscalizacao_proprietario_svo'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_proprietario_id' => 'Vigilancia Fiscalizacao Proprietario ID',
            'vigilancia_fiscalizacao_proprietario_tipo_id' => 'Vigilancia Fiscalizacao Proprietario Tipo ID',
            'vigilancia_fiscalizacao_proprietario_cpf' => 'Vigilancia Fiscalizacao Proprietario Cpf',
            'vigilancia_fiscalizacao_proprietario_cnpj' => 'Vigilancia Fiscalizacao Proprietario Cnpj',
            'vigilancia_fiscalizacao_proprietario_svo' => 'Vigilancia Fiscalizacao Proprietario Svo',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoProprietarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoProprietarioQuery(get_called_class());
    }
}
