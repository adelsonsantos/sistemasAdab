<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_animal_campos".
 *
 * @property int $vigilancia_fiscalizacao_animal_campos_id
 * @property int $vigilancia_fiscalizacao_animal_id
 * @property bool $vigilancia_fiscalizacao_animal_campos_machos_nascidos
 * @property bool $vigilancia_fiscalizacao_animal_campos_machos_mortos
 * @property bool $vigilancia_fiscalizacao_animal_campos_machos_existentes
 * @property bool $vigilancia_fiscalizacao_animal_campos_machos_vacinados
 * @property bool $vigilancia_fiscalizacao_animal_campos_femeas_nascidas
 * @property bool $vigilancia_fiscalizacao_animal_campos_femeas_mortas
 * @property bool $vigilancia_fiscalizacao_animal_campos_femeas_existentes
 * @property bool $vigilancia_fiscalizacao_animal_campos_femeas_vacinadas
 * @property bool $vigilancia_fiscalizacao_animal_campos_quantidade
 * @property int $vigilancia_fiscalizacao_animal_campos_st
 */
class TermoVigilanciaFiscalizacaoAnimalCampos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_animal_campos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_animal_id', 'vigilancia_fiscalizacao_animal_campos_st'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_animal_id', 'vigilancia_fiscalizacao_animal_campos_st'], 'integer'],
            [['vigilancia_fiscalizacao_animal_campos_machos_nascidos', 'vigilancia_fiscalizacao_animal_campos_machos_mortos', 'vigilancia_fiscalizacao_animal_campos_machos_existentes', 'vigilancia_fiscalizacao_animal_campos_machos_vacinados', 'vigilancia_fiscalizacao_animal_campos_femeas_nascidas', 'vigilancia_fiscalizacao_animal_campos_femeas_mortas', 'vigilancia_fiscalizacao_animal_campos_femeas_existentes', 'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas', 'vigilancia_fiscalizacao_animal_campos_quantidade'], 'boolean'],
            [['vigilancia_fiscalizacao_animal_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoAnimal::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_animal_id' => 'vigilancia_fiscalizacao_animal_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_animal_campos_id' => 'Campos ID',
            'vigilancia_fiscalizacao_animal_id' => 'Animal',
            'vigilancia_fiscalizacao_animal_campos_machos_nascidos' => 'Machos Nascidos',
            'vigilancia_fiscalizacao_animal_campos_machos_mortos' => 'Machos Mortos',
            'vigilancia_fiscalizacao_animal_campos_machos_existentes' => 'Machos Existentes',
            'vigilancia_fiscalizacao_animal_campos_machos_vacinados' => 'Machos Vacinados',
            'vigilancia_fiscalizacao_animal_campos_femeas_nascidas' => 'Fêmeas Nascidas',
            'vigilancia_fiscalizacao_animal_campos_femeas_mortas' => 'Fêmeas Mortas',
            'vigilancia_fiscalizacao_animal_campos_femeas_existentes' => 'Fêmeas Existentes',
            'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas' => 'Fêmeas Vacinadas',
            'vigilancia_fiscalizacao_animal_campos_quantidade' => 'Quantidade',
            'vigilancia_fiscalizacao_animal_campos_st' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAnimalCamposQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoAnimalCamposQuery(get_called_class());
    }
}
