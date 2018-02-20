<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "portal.contato_cordenadoria_gerencia".
 *
 * @property int $cog_id
 * @property int $id_coordenadoria
 * @property string $nome
 * @property int $ger_id
 * @property string $ger_nome
 * @property int $con_id
 * @property string $con_nome
 * @property string $con_ddd
 * @property string $con_telefone
 * @property int $cti_id
 * @property string $cti_nome
 */
class PortalContatoCordenadoriaGerencia extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.contato_cordenadoria_gerencia';
    }

    public function getPrimaryKey($asArray=false){
        return "cog_id";
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cog_id', 'id_coordenadoria', 'ger_id', 'con_id', 'cti_id'], 'default', 'value' => null],
            [['cog_id', 'id_coordenadoria', 'ger_id', 'con_id', 'cti_id'], 'integer'],
            [['nome'], 'string', 'max' => 200],
            [['ger_nome', 'con_nome', 'cti_nome'], 'string', 'max' => 60],
            [['con_ddd'], 'string', 'max' => 2],
            [['con_telefone'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cog_id' => 'Cog ID',
            'id_coordenadoria' => 'Coordenadoria',
            'nome' => 'Nome',
            'ger_id' => 'Gerência',
            'ger_nome' => 'Ger Nome',
            'con_id' => 'Con ID',
            'con_nome' => 'Con Nome',
            'con_ddd' => 'DDD',
            'con_telefone' => 'Telefone',
            'cti_id' => 'Tipo',
            'cti_nome' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContatoCoordenadoria()
    {
        return $this->hasOne(DiariaCoordenadoria::className(), ['id_coordenadoria' => 'id_coordenadoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContatoGerencia()
    {
        return $this->hasOne(PortalGerencia::className(), ['ger_id' => 'ger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContato()
    {
        return $this->hasOne(PortalContato::className(), ['con_id' => 'con_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContatoTipo()
    {
        return $this->hasOne(PortalContatoTipo::className(), ['cti_id' => 'cti_id']);
    }
}
