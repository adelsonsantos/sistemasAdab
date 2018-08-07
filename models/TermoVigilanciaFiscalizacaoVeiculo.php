<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_veiculo".
 *
 * @property int $vigilancia_fiscalizacao_veiculo_id
 * @property string $vigilancia_fiscalizacao_veiculo_placa
 * @property int $vigilancia_fiscalizacao_veiculo_km_incial
 * @property int $vigilancia_fiscalizacao_veiculo_km_final
 * @property string $vigilancia_fiscalizacao_veiculo_data_create
 */
class TermoVigilanciaFiscalizacaoVeiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_veiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_veiculo_km_incial', 'vigilancia_fiscalizacao_veiculo_km_final'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_veiculo_km_incial', 'vigilancia_fiscalizacao_veiculo_km_final'], 'integer'],
            [['vigilancia_fiscalizacao_veiculo_data_create'], 'safe'],
            [['vigilancia_fiscalizacao_veiculo_placa'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_veiculo_id' => 'ID',
            'vigilancia_fiscalizacao_veiculo_placa' => 'Placa',
            'vigilancia_fiscalizacao_veiculo_km_incial' => 'Km Incial',
            'vigilancia_fiscalizacao_veiculo_km_final' => 'Km Final',
            'vigilancia_fiscalizacao_veiculo_data_create' => 'Data',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoVeiculoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoVeiculoQuery(get_called_class());
    }
}
