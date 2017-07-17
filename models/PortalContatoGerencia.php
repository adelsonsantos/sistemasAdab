<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.contato_gerencia".
 *
 * @property integer $cge_id
 * @property integer $con_id
 * @property integer $ger_id
 *
 * @property PortalContato $con
 * @property PortalGerencia $ger
 */
class PortalContatoGerencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.contato_gerencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['con_id', 'ger_id'], 'required', 'message'=>'{attribute} não pode ficar em branco.'],
            [['con_id', 'ger_id'], 'integer'],
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
            'cge_id' => 'DDD',
            'con_id' => 'Contato',
            'ger_id' => 'Gerência',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCon()
    {
        return $this->hasOne(PortalContato::className(), ['con_id' => 'con_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGer()
    {
        return $this->hasOne(PortalGerencia::className(), ['ger_id' => 'ger_id']);
    }
}
