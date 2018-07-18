<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.movimentacao".
 *
 * @property int $movimentacao_id
 * @property int $entrada_id
 * @property int $saida_id
 * @property int $manutencao_id
 * @property int $manutencao_status
 */
class PortalMovimentacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.movimentacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entrada_id', 'saida_id', 'manutencao_id', 'manutencao_status'], 'required'],
            [['entrada_id', 'saida_id', 'manutencao_id', 'manutencao_status'], 'default', 'value' => null],
            [['entrada_id', 'saida_id', 'manutencao_id', 'manutencao_status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'movimentacao_id' => 'Movimentacao ID',
            'entrada_id' => 'Entrada ID',
            'saida_id' => 'Saida ID',
            'manutencao_id' => 'Manutencao ID',
            'manutencao_status' => 'Manutencao Status',
        ];
    }
}
