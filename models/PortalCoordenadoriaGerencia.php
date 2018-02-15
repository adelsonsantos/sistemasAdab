<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.coordenadoria_gerencia".
 *
 * @property int $cog_id
 * @property int $id_coordenadoria
 * @property int $ger_id
 * @property int $con_id
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
            [['id_coordenadoria'], 'required'],
            [['id_coordenadoria', 'ger_id', 'con_id'], 'default', 'value' => null],
            [['id_coordenadoria', 'ger_id', 'con_id'], 'integer'],
            [['id_coordenadoria'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaCoordenadoria::className(), 'targetAttribute' => ['id_coordenadoria' => 'id_coordenadoria']],
            [['con_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortalContato::className(), 'targetAttribute' => ['con_id' => 'con_id']],
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
            'con_id' => 'Con ID',
        ];
    }
}
