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
 * @property bool $vigilancia_fiscalizacao_animal_campos_femeas_mortos
 * @property bool $vigilancia_fiscalizacao_animal_campos_existentes
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
            [['vigilancia_fiscalizacao_animal_campos_machos_nascidos', 'vigilancia_fiscalizacao_animal_campos_machos_mortos', 'vigilancia_fiscalizacao_animal_campos_machos_existentes', 'vigilancia_fiscalizacao_animal_campos_machos_vacinados', 'vigilancia_fiscalizacao_animal_campos_femeas_nascidas', 'vigilancia_fiscalizacao_animal_campos_femeas_mortos', 'vigilancia_fiscalizacao_animal_campos_existentes', 'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas', 'vigilancia_fiscalizacao_animal_campos_quantidade'], 'boolean'],
            [['vigilancia_fiscalizacao_animal_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoAnimal::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_animal_id' => 'vigilancia_fiscalizacao_animal_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_animal_campos_id' => 'Vigilancia Fiscalizacao Animal Campos ID',
            'vigilancia_fiscalizacao_animal_id' => 'Vigilancia Fiscalizacao Animal ID',
            'vigilancia_fiscalizacao_animal_campos_machos_nascidos' => 'Vigilancia Fiscalizacao Animal Campos Machos Nascidos',
            'vigilancia_fiscalizacao_animal_campos_machos_mortos' => 'Vigilancia Fiscalizacao Animal Campos Machos Mortos',
            'vigilancia_fiscalizacao_animal_campos_machos_existentes' => 'Vigilancia Fiscalizacao Animal Campos Machos Existentes',
            'vigilancia_fiscalizacao_animal_campos_machos_vacinados' => 'Vigilancia Fiscalizacao Animal Campos Machos Vacinados',
            'vigilancia_fiscalizacao_animal_campos_femeas_nascidas' => 'Vigilancia Fiscalizacao Animal Campos Femeas Nascidas',
            'vigilancia_fiscalizacao_animal_campos_femeas_mortos' => 'Vigilancia Fiscalizacao Animal Campos Femeas Mortos',
            'vigilancia_fiscalizacao_animal_campos_existentes' => 'Vigilancia Fiscalizacao Animal Campos Existentes',
            'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas' => 'Vigilancia Fiscalizacao Animal Campos Femeas Vacinadas',
            'vigilancia_fiscalizacao_animal_campos_quantidade' => 'Vigilancia Fiscalizacao Animal Campos Quantidade',
            'vigilancia_fiscalizacao_animal_campos_st' => 'Vigilancia Fiscalizacao Animal Campos St',
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
