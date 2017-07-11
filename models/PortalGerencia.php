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
            [['ger_nome'], 'required'],
            [['ger_nome'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ger_id' => 'Ger ID',
            'ger_nome' => 'Ger Nome',
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
