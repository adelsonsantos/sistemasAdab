<?php

namespace app\models;

use Yii;

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
        return [
            [['entrada_quantidade', 'equipamento_id', 'setor_id', 'entrada_status', 'entrada_pessoa', 'entrada_data'], 'required'],
            [['entrada_quantidade', 'equipamento_id', 'setor_id', 'entrada_status', 'entrada_pessoa'], 'default', 'value' => null],
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
            'entrada_id' => 'Entrada ID',
            'entrada_quantidade' => 'Entrada Quantidade',
            'equipamento_id' => 'Equipamento ID',
            'setor_id' => 'Setor ID',
            'entrada_status' => 'Entrada Status',
            'entrada_pessoa' => 'Entrada Pessoa',
            'entrada_data' => 'Entrada Data',
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
