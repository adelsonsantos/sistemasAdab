<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.estado".
 *
 * @property string $estado_uf
 * @property string $estado_ds
 *
 * @property DadosUnicoEndereco[] $dadosUnicoEnderecos
 * @property DadosUnicoMunicipio[] $dadosUnicoMunicipios
 */
class DadosUnicoEstado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_uf', 'estado_ds'], 'required'],
            [['estado_uf'], 'string', 'max' => 2],
            [['estado_ds'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estado_uf' => 'Estado Uf',
            'estado_ds' => 'Estado Ds',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoEnderecos()
    {
        return $this->hasMany(DadosUnicoEndereco::className(), ['estado_uf' => 'estado_uf']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoMunicipios()
    {
        return $this->hasMany(DadosUnicoMunicipio::className(), ['estado_uf' => 'estado_uf']);
    }
}
