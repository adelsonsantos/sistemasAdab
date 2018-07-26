<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao_acoes".
 *
 * @property int $vigilancia_fiscalizacao_acoes_id
 * @property int $vigilancia_fiscalizacao_id
 * @property int $vigilancia_fiscalizacao_acao_id
 * @property int $vigilancia_fiscalizacao_acao_cmp_complentar_qtd
 */
class TermoVigilanciaFiscalizacaoAcoes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao_acoes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_id', 'vigilancia_fiscalizacao_acao_id', 'vigilancia_fiscalizacao_acao_cmp_complentar_qtd'], 'default', 'value' => null],
            [['vigilancia_fiscalizacao_id', 'vigilancia_fiscalizacao_acao_id', 'vigilancia_fiscalizacao_acao_cmp_complentar_qtd'], 'integer'],
            [['vigilancia_fiscalizacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacao::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_id' => 'vigilancia_fiscalizacao_id']],
            [['vigilancia_fiscalizacao_acao_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoAcao::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_acao_id' => 'vigilancia_fiscalizacao_acao_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_acoes_id' => 'Vigilancia Fiscalizacao Acoes ID',
            'vigilancia_fiscalizacao_id' => 'Vigilancia Fiscalizacao ID',
            'vigilancia_fiscalizacao_acao_id' => 'Vigilancia Fiscalizacao Acao ID',
            'vigilancia_fiscalizacao_acao_cmp_complentar_qtd' => 'Vigilancia Fiscalizacao Acao Cmp Complentar Qtd',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAcoesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoAcoesQuery(get_called_class());
    }
}
