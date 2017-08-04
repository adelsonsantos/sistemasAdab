<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.status".
 *
 * @property integer $status_id
 * @property string $status_ds
 */
class DiariaStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_ds'], 'required'],
            [['status_ds'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_ds' => 'Status Ds',
        ];
    }
}
