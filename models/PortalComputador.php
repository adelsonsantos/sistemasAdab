<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.computador".
 *
 * @property integer $com_id
 * @property string $com_mac
 * @property integer $id_coordenadoria
 * @property integer $ger_id
 *
 * @property DiariaCoordenadoria $idCoordenadoria
 * @property PortalGerencia $ger
 * @property PortalLogComputador[] $portalLogComputadors
 */
class PortalComputador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.computador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_mac', 'id_coordenadoria', 'ger_id'], 'required'],
            [['id_coordenadoria', 'ger_id'], 'integer'],
            [['com_mac'], 'string', 'max' => 17],
            [['id_coordenadoria'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaCoordenadoria::className(), 'targetAttribute' => ['id_coordenadoria' => 'id_coordenadoria']],
            [['ger_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortalGerencia::className(), 'targetAttribute' => ['ger_id' => 'ger_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'com_id' => 'Com ID',
            'com_mac' => 'Com Mac',
            'id_coordenadoria' => 'Id Coordenadoria',
            'ger_id' => 'Ger ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCoordenadoria()
    {
        return $this->hasOne(DiariaCoordenadoria::className(), ['id_coordenadoria' => 'id_coordenadoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGer()
    {
        return $this->hasOne(PortalGerencia::className(), ['ger_id' => 'ger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalLogComputadors()
    {
        return $this->hasMany(PortalLogComputador::className(), ['com_id' => 'com_id']);
    }
}
