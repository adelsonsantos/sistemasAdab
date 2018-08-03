<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_faixa_etaria".
 *
 * @property int $vigilancia_fiscalizacao_animal_faixa_etaria_id
 * @property string $vigilancia_fiscalizacao_animal_faixa_etaria_periodo
 * @property int $vigilancia_fiscalizacao_animal_id
 */
class TermoVigilanciaFiscalizacaoFaixaEtaria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_faixa_etaria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_animal_id'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_animal_id'], 'integer'],
            [['vigilancia_fiscalizacao_animal_faixa_etaria_periodo'], 'string', 'max' => 50],
            [['vigilancia_fiscalizacao_animal_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoAnimal::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_animal_id' => 'vigilancia_fiscalizacao_animal_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_animal_faixa_etaria_id' => 'Faixa Etaria ID',
            'vigilancia_fiscalizacao_animal_faixa_etaria_periodo' => 'Periodo',
            'vigilancia_fiscalizacao_animal_id' => 'Animal',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoFaixaEtariaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoFaixaEtariaQuery(get_called_class());
    }
}
