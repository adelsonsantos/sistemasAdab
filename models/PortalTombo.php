<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.tombo".
 *
 * @property int $tombo_id
 * @property string $tombo_imei
 * @property int $tombo_status
 */
class PortalTombo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.tombo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tombo_imei'], 'required'],
            [['tombo_status'], 'default', 'value' => null],
            [['tombo_status'], 'integer'],
            [['tombo_imei'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tombo_id' => 'Tombo ID',
            'tombo_imei' => 'Tombo Imei',
            'tombo_status' => 'Tombo Status',
        ];
    }
}
