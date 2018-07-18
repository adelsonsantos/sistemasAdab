<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.setor".
 *
 * @property int $setor_id
 * @property string $setor_nome
 * @property int $setor_status
 */
class PortalSetor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.setor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setor_nome', 'setor_status'], 'required'],
            [['setor_status'], 'default', 'value' => null],
            [['setor_status'], 'integer'],
            [['setor_nome'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setor_id' => 'Setor ID',
            'setor_nome' => 'Setor Nome',
            'setor_status' => 'Setor Status',
        ];
    }
}
