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
 * @property string $vigilancia_fiscalizacao_produtor_nome
 * @property int $vigilancia_fiscalizacao_produtor_codigo
 * @property string $vigilancia_fiscalizacao_produtor_telefone1
 * @property string $vigilancia_fiscalizacao_produtor_telefone2
 * @property string $vigilancia_fiscalizacao_produtor_celular
 * @property int $vigilancia_fiscalizacao_produtor_propriedade_codigo
 * @property string $vigilancia_fiscalizacao_produtor_propriedade_nome
 * @property string $vigilancia_fiscalizacao_produtor_propriedade_latitude
 * @property string $vigilancia_fiscalizacao_produtor_propriedade_longitude
 * @property string $vigilancia_fiscalizacao_produtor_area
 * @property string $vigilancia_fiscalizacao_produtor_confrontantes
 * @property string $vigilancia_fiscalizacao_produtor_vias_acesso
 */
class
TermoVigilanciaFiscalizacaoProdutor extends \yii\db\ActiveRecord
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
            [['vigilancia_fiscalizacao_produtor_tipo_id', 'vigilancia_fiscalizacao_produtor_codigo', 'vigilancia_fiscalizacao_produtor_propriedade_codigo'], 'integer'],
            [['vigilancia_fiscalizacao_produtor_cpf', 'vigilancia_fiscalizacao_produtor_telefone1', 'vigilancia_fiscalizacao_produtor_telefone2', 'vigilancia_fiscalizacao_produtor_celular'], 'string', 'max' => 14],
            [['vigilancia_fiscalizacao_produtor_cnpj', 'vigilancia_fiscalizacao_produtor_propriedade_latitude', 'vigilancia_fiscalizacao_produtor_propriedade_longitude' ], 'string', 'max' => 18],
            [['vigilancia_fiscalizacao_produtor_svo'], 'string', 'max' => 30],
            [['vigilancia_fiscalizacao_produtor_area'], 'string', 'max' => 50],
            [['vigilancia_fiscalizacao_produtor_nome', 'vigilancia_fiscalizacao_produtor_propriedade_nome'], 'string', 'max' => 80],
            [['vigilancia_fiscalizacao_produtor_confrontantes', 'vigilancia_fiscalizacao_produtor_vias_acesso'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_produtor_id' => 'Produtor ID',
            'vigilancia_fiscalizacao_produtor_tipo_id' => 'Tipo',
            'vigilancia_fiscalizacao_produtor_cpf' => 'Cpf',
            'vigilancia_fiscalizacao_produtor_cnpj' => 'Cnpj',
            'vigilancia_fiscalizacao_produtor_svo' => 'Svo',
            'vigilancia_fiscalizacao_produtor_nome' => 'Nome',
            'vigilancia_fiscalizacao_produtor_codigo' => 'vigilancia_fiscalizacao_produtor_codigo',
            'vigilancia_fiscalizacao_produtor_telefone1' => 'vigilancia_fiscalizacao_produtor_telefone1',
            'vigilancia_fiscalizacao_produtor_telefone2' => 'vigilancia_fiscalizacao_produtor_telefone2',
            'vigilancia_fiscalizacao_produtor_celular' => 'vigilancia_fiscalizacao_produtor_celular',
            'vigilancia_fiscalizacao_produtor_propriedade_codigo' => 'vigilancia_fiscalizacao_produtor_propriedade_codigo',
            'vigilancia_fiscalizacao_produtor_propriedade_nome' => 'vigilancia_fiscalizacao_produtor_propriedade_nome',
            'vigilancia_fiscalizacao_produtor_propriedade_latitude' => 'vigilancia_fiscalizacao_produtor_propriedade_latitude',
            'vigilancia_fiscalizacao_produtor_propriedade_longitude' => 'vigilancia_fiscalizacao_produtor_propriedade_longitude',
            'vigilancia_fiscalizacao_produtor_area' => 'vigilancia_fiscalizacao_produtor_area',
            'vigilancia_fiscalizacao_produtor_confrontantes' => 'vigilancia_fiscalizacao_produtor_confrontantes',
            'vigilancia_fiscalizacao_produtor_vias_acesso' => 'vigilancia_fiscalizacao_produtor_vias_acesso',
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
