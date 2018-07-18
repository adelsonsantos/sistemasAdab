<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.saida".
 *
 * @property int $saida_id
 * @property int $saida_quantidade
 * @property int $equipamento_id
 * @property int $setor_id
 * @property int $saida_status
 */
class PortalSaida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.saida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['saida_quantidade', 'equipamento_id', 'setor_id', 'saida_status'], 'required'],
            [['saida_quantidade', 'equipamento_id', 'setor_id', 'saida_status'], 'default', 'value' => null],
            [['saida_quantidade', 'equipamento_id', 'setor_id', 'saida_status'], 'integer'],
            [['equipamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortalEquipamento::className(), 'targetAttribute' => ['equipamento_id' => 'equipamento_id']],
            [['setor_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortalSetor::className(), 'targetAttribute' => ['setor_id' => 'setor_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'saida_id' => 'Saida ID',
            'saida_quantidade' => 'Saida Quantidade',
            'equipamento_id' => 'Equipamento ID',
            'setor_id' => 'Setor ID',
            'saida_status' => 'Saida Status',
        ];
    }
}
