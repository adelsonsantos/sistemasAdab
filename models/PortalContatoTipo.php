<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.contato_tipo".
 *
 * @property int $cti_id
 * @property string $cti_nome
 */
class PortalContatoTipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.contato_tipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cti_nome'], 'required'],
            [['cti_nome'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cti_id' => 'Cti ID',
            'cti_nome' => 'Cti Nome',
        ];
    }
}
