<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.escritorio".
 *
 * @property int $esc_id
 * @property string $esc_nome
 * @property int $id_coordenadoria
 * @property int $ger_id
 */
class PortalEscritorio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.escritorio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['esc_nome', 'id_coordenadoria', 'ger_id'], 'required'],
            [['id_coordenadoria', 'ger_id'], 'default', 'value' => null],
            [['id_coordenadoria', 'ger_id'], 'integer'],
            [['esc_nome'], 'string', 'max' => 60],
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
            'esc_id' => 'Esc ID',
            'esc_nome' => 'Esc Nome',
            'id_coordenadoria' => 'Id Coordenadoria',
            'ger_id' => 'Ger ID',
        ];
    }
}
