<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.coordenadoria_gerencia".
 *
 * @property integer $cog_id
 * @property integer $id_coordenadoria
 * @property integer $ger_id
 *
 * @property DiariaCoordenadoria $idCoordenadoria
 * @property PortalGerencia $ger
 */
class PortalCoordenadoriaGerencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.coordenadoria_gerencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_coordenadoria', 'ger_id'], 'required'],
            [['id_coordenadoria', 'ger_id'], 'integer'],
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
            'cog_id' => 'Cog ID',
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
}
