<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.contato_coordenadoria".
 *
 * @property integer $coc_id
 * @property integer $con_id
 * @property integer $id_coordenadoria
 *
 * @property DiariaCoordenadoria $idCoordenadoria
 * @property PortalContato $con
 */
class PortalContatoCoordenadoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.contato_coordenadoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['con_id', 'id_coordenadoria'], 'required', 'message'=>'{attribute} não pode ficar em branco.'],
            [['con_id', 'id_coordenadoria'], 'integer'],
            [['id_coordenadoria'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaCoordenadoria::className(), 'targetAttribute' => ['id_coordenadoria' => 'id_coordenadoria']],
            [['con_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortalContato::className(), 'targetAttribute' => ['con_id' => 'con_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coc_id' => 'Coc ID',
            'con_id' => 'Con ID',
            'id_coordenadoria' => 'Coordenadoria',
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
    public function getCon()
    {
        return $this->hasOne(PortalContato::className(), ['con_id' => 'con_id']);
    }
}
