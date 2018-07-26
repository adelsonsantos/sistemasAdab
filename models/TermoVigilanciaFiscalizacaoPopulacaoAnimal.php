<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_populacao_animal".
 *
 * @property int $vigilancia_fiscalizacao_populacao_animal_id
 * @property int $vigilancia_fiscalizacao_id
 * @property int $vigilancia_fiscalizacao_faixa_etaria_id
 * @property int $vigilancia_fiscalizacao_populacao_animal_machos_nascidos
 * @property int $vigilancia_fiscalizacao_populacao_animal_machos_mortos
 * @property int $vigilancia_fiscalizacao_populacao_animal_machos_existentes
 * @property int $vigilancia_fiscalizacao_populacao_animal_machos_vacinados
 * @property int $vigilancia_fiscalizacao_populacao_animal_femeas_nascidas
 * @property int $vigilancia_fiscalizacao_animal_campos_femeas_mortos
 * @property int $vigilancia_fiscalizacao_populacao_animal_femeas_existentes
 * @property int $vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas
 * @property int $vigilancia_fiscalizacao_populacao_animal_quantidade
 * @property int $vigilancia_fiscalizacao_populacao_animal_st
 * @property int $vigilancia_fiscalizacao_animal_id
 */
class TermoVigilanciaFiscalizacaoPopulacaoAnimal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_populacao_animal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_id', 'vigilancia_fiscalizacao_faixa_etaria_id', 'vigilancia_fiscalizacao_populacao_animal_machos_nascidos', 'vigilancia_fiscalizacao_populacao_animal_machos_mortos', 'vigilancia_fiscalizacao_populacao_animal_machos_existentes', 'vigilancia_fiscalizacao_populacao_animal_machos_vacinados', 'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas', 'vigilancia_fiscalizacao_animal_campos_femeas_mortos', 'vigilancia_fiscalizacao_populacao_animal_femeas_existentes', 'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas', 'vigilancia_fiscalizacao_populacao_animal_quantidade', 'vigilancia_fiscalizacao_populacao_animal_st', 'vigilancia_fiscalizacao_animal_id'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_id', 'vigilancia_fiscalizacao_faixa_etaria_id', 'vigilancia_fiscalizacao_populacao_animal_machos_nascidos', 'vigilancia_fiscalizacao_populacao_animal_machos_mortos', 'vigilancia_fiscalizacao_populacao_animal_machos_existentes', 'vigilancia_fiscalizacao_populacao_animal_machos_vacinados', 'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas', 'vigilancia_fiscalizacao_animal_campos_femeas_mortos', 'vigilancia_fiscalizacao_populacao_animal_femeas_existentes', 'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas', 'vigilancia_fiscalizacao_populacao_animal_quantidade', 'vigilancia_fiscalizacao_populacao_animal_st', 'vigilancia_fiscalizacao_animal_id'], 'integer'],
            [['vigilancia_fiscalizacao_animal_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoAnimal::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_animal_id' => 'vigilancia_fiscalizacao_animal_id']],
            [['vigilancia_fiscalizacao_faixa_etaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoFaixaEtaria::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_faixa_etaria_id' => 'vigilancia_fiscalizacao_faixa_etaria_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_populacao_animal_id' => 'Vigilancia Fiscalizacao Populacao Animal ID',
            'vigilancia_fiscalizacao_id' => 'Vigilancia Fiscalizacao ID',
            'vigilancia_fiscalizacao_faixa_etaria_id' => 'Vigilancia Fiscalizacao Faixa Etaria ID',
            'vigilancia_fiscalizacao_populacao_animal_machos_nascidos' => 'Vigilancia Fiscalizacao Populacao Animal Machos Nascidos',
            'vigilancia_fiscalizacao_populacao_animal_machos_mortos' => 'Vigilancia Fiscalizacao Populacao Animal Machos Mortos',
            'vigilancia_fiscalizacao_populacao_animal_machos_existentes' => 'Vigilancia Fiscalizacao Populacao Animal Machos Existentes',
            'vigilancia_fiscalizacao_populacao_animal_machos_vacinados' => 'Vigilancia Fiscalizacao Populacao Animal Machos Vacinados',
            'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas' => 'Vigilancia Fiscalizacao Populacao Animal Femeas Nascidas',
            'vigilancia_fiscalizacao_animal_campos_femeas_mortos' => 'Vigilancia Fiscalizacao Animal Campos Femeas Mortos',
            'vigilancia_fiscalizacao_populacao_animal_femeas_existentes' => 'Vigilancia Fiscalizacao Populacao Animal Femeas Existentes',
            'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas' => 'Vigilancia Fiscalizacao Populacao Animal Femeas Vacinadas',
            'vigilancia_fiscalizacao_populacao_animal_quantidade' => 'Vigilancia Fiscalizacao Populacao Animal Quantidade',
            'vigilancia_fiscalizacao_populacao_animal_st' => 'Vigilancia Fiscalizacao Populacao Animal St',
            'vigilancia_fiscalizacao_animal_id' => 'Vigilancia Fiscalizacao Animal ID',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoPopulacaoAnimalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoPopulacaoAnimalQuery(get_called_class());
    }
}
