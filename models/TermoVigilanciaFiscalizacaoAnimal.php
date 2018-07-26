<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_animal".
 *
 * @property int $vigilancia_fiscalizacao_animal_id
 * @property string $vigilancia_fiscalizacao_animal_nome
 * @property int $vigilancia_fiscalizacao_animal_st
 */
class TermoVigilanciaFiscalizacaoAnimal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_animal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_animal_st'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_animal_st'], 'integer'],
            [['vigilancia_fiscalizacao_animal_nome'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_animal_id' => 'Vigilancia Fiscalizacao Animal ID',
            'vigilancia_fiscalizacao_animal_nome' => 'Vigilancia Fiscalizacao Animal Nome',
            'vigilancia_fiscalizacao_animal_st' => 'Vigilancia Fiscalizacao Animal St',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAnimalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoAnimalQuery(get_called_class());
    }
}
