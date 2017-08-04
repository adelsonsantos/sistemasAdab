<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.municipio".
 *
 * @property integer $municipio_cd
 * @property integer $territorio_cd
 * @property string $estado_uf
 * @property string $municipio_ds
 * @property string $municipio_capital
 *
 * @property DadosUnicoEndereco[] $dadosUnicoEnderecos
 * @property DadosUnicoEstado $estadoUf
 * @property DiariaPercentualCapital[] $diariaPercentualCapitals
 */
class DadosUnicoMunicipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['municipio_cd', 'estado_uf', 'municipio_ds'], 'required'],
            [['municipio_cd', 'territorio_cd'], 'integer'],
            [['municipio_capital'], 'number'],
            [['estado_uf'], 'string', 'max' => 2],
            [['municipio_ds'], 'string', 'max' => 100],
            [['estado_uf'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoEstado::className(), 'targetAttribute' => ['estado_uf' => 'estado_uf']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'municipio_cd' => 'Municipio Cd',
            'territorio_cd' => 'Territorio Cd',
            'estado_uf' => 'Estado Uf',
            'municipio_ds' => 'Municipio Ds',
            'municipio_capital' => 'Municipio Capital',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoEnderecos()
    {
        return $this->hasMany(DadosUnicoEndereco::className(), ['municipio_cd' => 'municipio_cd']);
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
    public function getDiariaPercentualCapitals()
    {
        return $this->hasMany(DiariaPercentualCapital::className(), ['municipio_cd' => 'municipio_cd']);
    }
}
