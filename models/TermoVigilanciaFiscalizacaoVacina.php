<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_vacina".
 *
 * @property int $vigilancia_fiscalizacao_vacina_id
 * @property int $vigilancia_fiscalizacao_febre_aftosa_revenda
 * @property int $vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda
 * @property int $vigilancia_fiscalizacao_brucelose_revenda
 * @property string $vigilancia_fiscalizacao_outros_revenda
 * @property string $vigilancia_fiscalizacao_febre_aftosa_nota_fiscal
 * @property string $vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal
 * @property string $vigilancia_fiscalizacao_brucelose_nota_fiscal
 * @property int $vigilancia_fiscalizacao_febre_aftosa_laboratorio_id
 * @property int $vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id
 * @property int $vigilancia_fiscalizacao_brucelose_laboratorio_id
 * @property int $vigilancia_fiscalizacao_outros_laboratorio_id
 * @property string $vigilancia_fiscalizacao_febre_aftosa_partida
 * @property string $vigilancia_fiscalizacao_raiva_dos_herbivoros_partida
 * @property string $vigilancia_fiscalizacao_brucelose_partida
 * @property string $vigilancia_fiscalizacao_outros_partida
 * @property string $vigilancia_fiscalizacao_febre_aftosa_validade
 * @property string $vigilancia_fiscalizacao_raiva_dos_herbivoros_validade
 * @property string $vigilancia_fiscalizacao_brucelose_validade
 * @property string $vigilancia_fiscalizacao_outros_validade
 * @property string $vigilancia_fiscalizacao_febre_aftosa_data_vacinacao
 * @property string $vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao
 * @property string $vigilancia_fiscalizacao_brucelose_data_vacinacao
 * @property string $vigilancia_fiscalizacao_outros_data_vacinacao
 */
class TermoVigilanciaFiscalizacaoVacina extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_vacina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_febre_aftosa_revenda', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda', 'vigilancia_fiscalizacao_brucelose_revenda', 'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id', 'vigilancia_fiscalizacao_brucelose_laboratorio_id', 'vigilancia_fiscalizacao_outros_laboratorio_id'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_febre_aftosa_revenda', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda', 'vigilancia_fiscalizacao_brucelose_revenda', 'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id', 'vigilancia_fiscalizacao_brucelose_laboratorio_id', 'vigilancia_fiscalizacao_outros_laboratorio_id'], 'integer'],
            [['vigilancia_fiscalizacao_febre_aftosa_validade', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade', 'vigilancia_fiscalizacao_brucelose_validade', 'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao', 'vigilancia_fiscalizacao_brucelose_data_vacinacao'], 'safe'],
            [['vigilancia_fiscalizacao_outros_revenda', 'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal', 'vigilancia_fiscalizacao_brucelose_nota_fiscal', 'vigilancia_fiscalizacao_outros_validade', 'vigilancia_fiscalizacao_outros_data_vacinacao'], 'string', 'max' => 255],
            [['vigilancia_fiscalizacao_febre_aftosa_partida', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida', 'vigilancia_fiscalizacao_brucelose_partida'], 'string', 'max' => 10],
            [['vigilancia_fiscalizacao_outros_partida'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_vacina_id' => 'Vacina',
            'vigilancia_fiscalizacao_febre_aftosa_revenda' => 'Revenda',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda' => 'Revenda',
            'vigilancia_fiscalizacao_brucelose_revenda' => 'Revenda',
            'vigilancia_fiscalizacao_outros_revenda' => 'Revenda',
            'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal' => 'Nota Fiscal',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal' => 'Nota Fiscal',
            'vigilancia_fiscalizacao_brucelose_nota_fiscal' => 'Nota Fiscal',
            'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id' => 'Laboratorio',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id' => 'Laboratorio',
            'vigilancia_fiscalizacao_brucelose_laboratorio_id' => 'Laboratorio',
            'vigilancia_fiscalizacao_outros_laboratorio_id' => 'Laboratorio',
            'vigilancia_fiscalizacao_febre_aftosa_partida' => 'Partida',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida' => 'Partida',
            'vigilancia_fiscalizacao_brucelose_partida' => 'Partida',
            'vigilancia_fiscalizacao_outros_partida' => 'Partida',
            'vigilancia_fiscalizacao_febre_aftosa_validade' => 'Validade',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade' => 'Validade',
            'vigilancia_fiscalizacao_brucelose_validade' => 'Validade',
            'vigilancia_fiscalizacao_outros_validade' => 'Outros Validade',
            'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao' => 'Data Vacinacao',
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao' => 'Data Vacinacao',
            'vigilancia_fiscalizacao_brucelose_data_vacinacao' => 'Data Vacinacao',
            'vigilancia_fiscalizacao_outros_data_vacinacao' => 'Data Vacinacao',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoVacinaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoVacinaQuery(get_called_class());
    }
}
