<?php

namespace app\models;

use DateTime;
use Yii;

/**
 * This is the model class for table "portal.equipamento".
 *
 * @property int $equipamento_id
 * @property string $equipamento_nome
 * @property int $equipamento_quantidade_min
 * @property int $equipamento_status
 * @property int $equipamento_pessoa
 * @property string $equipamento_data
 */
class PortalEquipamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.equipamento';
    }

    /**
     * @inheritdoc
     */
    //
    public function rules()
    {
        $DateTime =   new DateTime();
        return [
            [['equipamento_nome', 'equipamento_quantidade_min', 'equipamento_status', 'equipamento_pessoa', 'equipamento_data'], 'required'],
            [['equipamento_quantidade_min', 'equipamento_status'], 'default', 'value' => null],
            [['equipamento_data'], 'default', 'value' => $DateTime->format( "Y-m-d H:i:s" )],
            [['equipamento_pessoa'], 'default', 'value' => 5559],
            [['equipamento_quantidade_min', 'equipamento_status', 'equipamento_pessoa'], 'integer'],
            [['equipamento_data'], 'safe'],
            [['equipamento_nome'], 'string', 'max' => 255],
            [['equipamento_pessoa'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['equipamento_pessoa' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equipamento_id' => 'Equipamento ID',
            'equipamento_nome' => 'Equipamento Nome',
            'equipamento_quantidade_min' => 'Equipamento Quantidade Min',
            'equipamento_status' => 'Equipamento Status',
            'equipamento_pessoa' => 'Equipamento Pessoa',
            'equipamento_data' => 'Equipamento Data',
        ];
    }
}
