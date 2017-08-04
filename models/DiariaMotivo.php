<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.diaria_motivo".
 *
 * @property integer $diaria_id
 * @property integer $motivo_id
 * @property integer $sub_motivo_id
 *
 * @property DiariaDiaria $diaria
 * @property DiariaMotivo $motivo
 */
class DiariaMotivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.diaria_motivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'motivo_id'], 'required'],
            [['diaria_id', 'motivo_id', 'sub_motivo_id'], 'integer'],
            [['diaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diarias::className(), 'targetAttribute' => ['diaria_id' => 'diaria_id']],
            [['motivo_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaMotivo::className(), 'targetAttribute' => ['motivo_id' => 'motivo_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diaria_id' => 'Diaria ID',
            'motivo_id' => 'Motivo ID',
            'sub_motivo_id' => 'Sub Motivo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaria()
    {
        return $this->hasOne(Diarias::className(), ['diaria_id' => 'diaria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotivo()
    {
        return $this->hasOne(DiariaMotivo::className(), ['motivo_id' => 'motivo_id']);
    }
}
