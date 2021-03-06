<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.gerencia".
 *
 * @property integer $ger_id
 * @property string $ger_nome
 *
 * @property PortalComputador[] $portalComputadors
 * @property PortalContatoGerencia[] $portalContatoGerencias
 * @property PortalCoordenadoriaGerencia[] $portalCoordenadoriaGerencias
 */
class PortalGerencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.gerencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ger_nome','id_coordenadoria'], 'required', 'message'=>'{attribute} não pode ficar em branco.'],
            [['ger_nome'], 'string', 'max' => 60],
            [['id_coordenadoria'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ger_id' => 'Ger ID',
            'id_coordenadoria'=>'coordenadoria',
            'ger_nome' => 'Nome da Gerência',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalComputadors()
    {
        return $this->hasMany(PortalComputador::className(), ['ger_id' => 'ger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordenadoria()
    {
        return $this->hasOne(DiariaCoordenadoria::className(), ['id_coordenadoria' => 'id_coordenadoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalContatoGerencias()
    {
        return $this->hasMany(PortalContatoGerencia::className(), ['ger_id' => 'ger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalCoordenadoriaGerencias()
    {
        return $this->hasMany(PortalCoordenadoriaGerencia::className(), ['ger_id' => 'ger_id']);
    }
}
