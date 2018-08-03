<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.pessoa_juridica".
 *
 * @property int $pessoa_id
 * @property string $pessoa_juridica_cnpj
 * @property string $pessoa_juridica_nm_fantasia
 * @property string $pessoa_juridica_insc_mun
 * @property string $pessoa_juridica_insc_est
 * @property string $pessoa_juridica_dt_abertura
 * @property string $pessoa_juridica_contato
 * @property string $pessoa_juridica_fornecedor
 */
class DadosUnicoPessoaJuridica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.pessoa_juridica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'pessoa_juridica_cnpj'], 'required'],
            [['pessoa_id'], 'default', 'value' => null],
            [['pessoa_id'], 'integer'],
            [['pessoa_juridica_fornecedor'], 'number'],
            [['pessoa_juridica_cnpj'], 'string', 'max' => 18],
            [['pessoa_juridica_nm_fantasia'], 'string', 'max' => 200],
            [['pessoa_juridica_insc_mun', 'pessoa_juridica_insc_est'], 'string', 'max' => 50],
            [['pessoa_juridica_dt_abertura'], 'string', 'max' => 10],
            [['pessoa_juridica_contato'], 'string', 'max' => 100],
            [['pessoa_id'], 'unique'],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pessoa_id' => 'Pessoa ID',
            'pessoa_juridica_cnpj' => 'Pessoa Juridica Cnpj',
            'pessoa_juridica_nm_fantasia' => 'Pessoa Juridica Nm Fantasia',
            'pessoa_juridica_insc_mun' => 'Pessoa Juridica Insc Mun',
            'pessoa_juridica_insc_est' => 'Pessoa Juridica Insc Est',
            'pessoa_juridica_dt_abertura' => 'Pessoa Juridica Dt Abertura',
            'pessoa_juridica_contato' => 'Pessoa Juridica Contato',
            'pessoa_juridica_fornecedor' => 'Pessoa Juridica Fornecedor',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosUnicoPessoaJuridicaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosUnicoPessoaJuridicaQuery(get_called_class());
    }
}
