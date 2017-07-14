<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "portal.contato".
 *
 * @property integer $con_id
 * @property string $con_nome
 * @property string $con_telefone
 * @property string $con_ddd
 *
 * @property PortalContatoCoordenadoria[] $portalContatoCoordenadorias
 * @property PortalContatoGerencia[] $portalContatoGerencias
 */
class PortalContato extends ActiveRecord
{
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
            [['con_telefone', 'con_ddd'], 'required'],
            [['con_nome'], 'string', 'max' => 60],
            [['con_telefone'], 'string', 'max' => 12],
            [['con_ddd'], 'string', 'max' => 2],
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
}
