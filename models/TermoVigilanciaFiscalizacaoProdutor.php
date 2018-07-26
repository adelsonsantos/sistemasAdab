<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_produtor".
 *
 * @property int $vigilancia_fiscalizacao_produtor_id
 * @property int $vigilancia_fiscalizacao_produtor_tipo_id
 * @property string $vigilancia_fiscalizacao_produtor_cpf
 * @property string $vigilancia_fiscalizacao_produtor_cnpj
 * @property string $vigilancia_fiscalizacao_produtor_svo
 */
class TermoVigilanciaFiscalizacaoProdutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_produtor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_produtor_tipo_id'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_produtor_tipo_id'], 'integer'],
            [['vigilancia_fiscalizacao_produtor_cpf'], 'string', 'max' => 14],
            [['vigilancia_fiscalizacao_produtor_cnpj'], 'string', 'max' => 18],
            [['vigilancia_fiscalizacao_produtor_svo'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_produtor_id' => 'Vigilancia Fiscalizacao Produtor ID',
            'vigilancia_fiscalizacao_produtor_tipo_id' => 'Vigilancia Fiscalizacao Produtor Tipo ID',
            'vigilancia_fiscalizacao_produtor_cpf' => 'Vigilancia Fiscalizacao Produtor Cpf',
            'vigilancia_fiscalizacao_produtor_cnpj' => 'Vigilancia Fiscalizacao Produtor Cnpj',
            'vigilancia_fiscalizacao_produtor_svo' => 'Vigilancia Fiscalizacao Produtor Svo',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoProdutorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoProdutorQuery(get_called_class());
    }
}
