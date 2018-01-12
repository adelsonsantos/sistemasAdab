<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.diaria_devolucao".
 *
 * @property integer $diaria_devolucao_id
 * @property integer $diaria_id
 * @property integer $motivo_id
 * @property string $diaria_devolucao_ds
 * @property string $diaria_devolucao_dt
 * @property string $diaria_devolucao_hr
 * @property integer $diaria_devolucao_func
 * @property integer $diaria_devolucao_func_exec
 * @property string $super_sd
 * @property integer $diaria_st
 *
 * @property DiariaDiaria $diaria
 */
class DiariaDevolucao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.diaria_devolucao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'motivo_id', 'diaria_devolucao_dt', 'diaria_devolucao_hr', 'diaria_devolucao_func'], 'required'],
            [['diaria_id', 'motivo_id', 'diaria_devolucao_func', 'diaria_devolucao_func_exec', 'diaria_st'], 'integer'],
            [['diaria_devolucao_dt'], 'safe'],
            [['diaria_devolucao_ds'], 'string', 'max' => 255],
            [['diaria_devolucao_hr'], 'string', 'max' => 10],
            [['super_sd'], 'string', 'max' => 12],
            [['diaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diarias::className(), 'targetAttribute' => ['diaria_id' => 'diaria_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diaria_devolucao_id' => 'Diaria Devolucao ID',
            'diaria_id' => 'Diaria ID',
            'motivo_id' => 'Motivo ID',
            'diaria_devolucao_ds' => 'Diaria Devolucao Ds',
            'diaria_devolucao_dt' => 'Diaria Devolucao Dt',
            'diaria_devolucao_hr' => 'Diaria Devolucao Hr',
            'diaria_devolucao_func' => 'Diaria Devolucao Func',
            'diaria_devolucao_func_exec' => 'Diaria Devolucao Func Exec',
            'super_sd' => 'Super Sd',
            'diaria_st' => 'Diaria St',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaria()
    {
        return $this->hasOne(DiariaDiaria::className(), ['diaria_id' => 'diaria_id']);
    }
}
