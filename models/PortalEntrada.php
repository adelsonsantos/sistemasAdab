<?php

namespace app\models;

use Yii;
use DateTime;

/**
 * This is the model class for table "portal.entrada".
 *
 * @property int $entrada_id
 * @property int $entrada_quantidade
 * @property int $equipamento_id
 * @property int $setor_id
 * @property int $entrada_status
 * @property int $entrada_pessoa
 * @property string $entrada_data
 */
class PortalEntrada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.entrada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $DateTime =   new DateTime();
        return [
            [['entrada_quantidade', 'equipamento_id', 'setor_id', 'entrada_status', 'entrada_pessoa', 'entrada_data'], 'required'],
            [['entrada_quantidade', 'equipamento_id', 'setor_id', 'entrada_status', 'entrada_pessoa'], 'default', 'value' => null],
            //[['entrada_status'], 'default', 'value' => 1],
           // [['entrada_data'], 'default', 'value' => $DateTime->format( "Y-m-d H:i:s" )],
            [['entrada_quantidade', 'equipamento_id', 'setor_id', 'entrada_status', 'entrada_pessoa'], 'integer'],
            [['entrada_data'], 'safe'],
            [['entrada_pessoa'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['entrada_pessoa' => 'pessoa_id']],
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
            'entrada_id' => 'ID',
            'entrada_quantidade' => 'Quantidade',
            'equipamento_id' => 'Equipamento ID',
            'setor_id' => 'Setor',
            'entrada_status' => 'Status',
            'entrada_pessoa' => 'Pessoa',
            'entrada_data' => 'Data',
        ];
    }

    public function checkEmail($email, $domainCheck = false)
    {
        if (preg_match('/^[a-zA-Z0-9\._-]+\@(\[?)[a-zA-Z0-9\-\.]+'.
            '\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $email)) {
            if ($domainCheck && function_exists('checkdnsrr')) {
                list (, $domain)  = explode('@', $email);
                if (checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A')) {
                    return true;
                }
                return false;
            }
            return true;
        }
        return false;
    }
}
