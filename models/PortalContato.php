<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "portal.contato".
 *
 * @property integer $con_id
 * @property integer $cti_id
 * @property string $con_nome
 * @property string $con_telefone
 * @property string $con_ddd
 *
 * @property PortalContatoCoordenadoria[] $portalContatoCoordenadorias
 * @property PortalContatoGerencia[] $portalContatoGerencias
 */
class PortalContato extends ActiveRecord
{
    const COORDENADORIA = 1;
    const GERENCIA       = 2;
    const ESCRITORIO     = 3;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.contato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['con_telefone', 'con_ddd'], 'required','message'=>'{attribute} não pode ficar em branco.'],
            [['con_nome'], 'string', 'max' => 60],
            [['con_telefone'], 'string', 'max' => 12],
            [['cti_id'], 'integer'],
            [['con_ddd'], 'string', 'max' => 2],
            [['cti_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortalContatoTipo::className(), 'targetAttribute' => ['cti_id' => 'cti_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'con_id' => 'Con ID',
            'con_nome' => 'Nome',
            'con_telefone' => 'Telefone',
            'con_ddd' => 'DDD',
            'cti_id' => 'tipo'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalContatoCoordenadorias()
    {
        return $this->hasMany(PortalContatoCoordenadoria::className(), ['con_id' => 'con_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalContatoGerencias()
    {
        return $this->hasMany(PortalContatoGerencia::className(), ['con_id' => 'con_id']);
    }

    function validEmail($email){
// Check the formatting is correct
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            return FALSE;
        }
// Next check the domain is real.
        $domain = explode("@", $email, 2);
        return checkdnsrr($domain[1]); // returns TRUE/FALSE;
    }

}
