<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_equipe_fiscal".
 *
 * @property int $vigilancia_fiscalizacao_equipe_fiscal_id
 * @property int $pessoa_id
 * @property int $vigilancia_fiscalizacao_id
 */
class TermoVigilanciaFiscalizacaoEquipeFiscal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_equipe_fiscal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'vigilancia_fiscalizacao_id'], 'default', 'value' => null],
            [['pessoa_id', 'vigilancia_fiscalizacao_id'], 'integer'],
            [['vigilancia_fiscalizacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacao::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_id' => 'vigilancia_fiscalizacao_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_equipe_fiscal_id' => 'Vigilancia Fiscalizacao Equipe Fiscal ID',
            'pessoa_id' => 'Pessoa ID',
            'vigilancia_fiscalizacao_id' => 'Vigilancia Fiscalizacao ID',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoEquipeFiscalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoEquipeFiscalQuery(get_called_class());
    }
}
