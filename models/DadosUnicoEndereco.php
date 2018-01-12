<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.endereco".
 *
 * @property integer $endereco_id
 * @property integer $pessoa_id
 * @property string $estado_uf
 * @property integer $municipio_cd
 * @property string $endereco_bairro
 * @property string $endereco_ds
 * @property string $endereco_num
 * @property string $endereco_complemento
 * @property string $endereco_cep
 * @property string $endereco_referencia
 *
 * @property DadosUnicoEstado $estadoUf
 * @property DadosUnicoMunicipio $municipioCd
 * @property DadosUnicoPessoa $pessoa
 */
class DadosUnicoEndereco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.endereco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'estado_uf', 'municipio_cd', 'endereco_bairro', 'endereco_ds'], 'required'],
            [['pessoa_id', 'municipio_cd'], 'integer'],
            [['estado_uf'], 'string', 'max' => 2],
            [['endereco_bairro'], 'string', 'max' => 100],
            [['endereco_ds'], 'string', 'max' => 150],
            [['endereco_num'], 'string', 'max' => 10],
            [['endereco_complemento'], 'string', 'max' => 50],
            [['endereco_cep'], 'string', 'max' => 9],
            [['endereco_referencia'], 'string', 'max' => 256],
            [['estado_uf'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoEstado::className(), 'targetAttribute' => ['estado_uf' => 'estado_uf']],
            [['municipio_cd'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoMunicipio::className(), 'targetAttribute' => ['municipio_cd' => 'municipio_cd']],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'endereco_id' => 'Endereco ID',
            'pessoa_id' => 'Pessoa ID',
            'estado_uf' => 'Estado Uf',
            'municipio_cd' => 'Municipio Cd',
            'endereco_bairro' => 'Endereco Bairro',
            'endereco_ds' => 'Endereco Ds',
            'endereco_num' => 'Endereco Num',
            'endereco_complemento' => 'Endereco Complemento',
            'endereco_cep' => 'Endereco Cep',
            'endereco_referencia' => 'Endereco Referencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoUf()
    {
        return $this->hasOne(DadosUnicoEstado::className(), ['estado_uf' => 'estado_uf']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipioCd()
    {
        return $this->hasOne(DadosUnicoMunicipio::className(), ['municipio_cd' => 'municipio_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(DadosUnicoPessoa::className(), ['pessoa_id' => 'pessoa_id']);
    }
}
