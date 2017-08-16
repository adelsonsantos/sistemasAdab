<?php

namespace app\models;

/**
 * This is the model class for table "diaria.diaria_pre_autorizacao".
 *
 * @property integer $diaria_pre_autorizacao_id
 * @property integer $diaria_id
 * @property integer $diaria_pre_autorizacao_func
 * @property integer $diaria_pre_autorizacao_func_exec
 * @property string $diaria_pre_autorizacao_dt
 * @property string $diaria_pre_autorizacao_hr
 */
class DiariaPreAutorizacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.diaria_pre_autorizacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id'], 'required'],
            [['diaria_id', 'diaria_pre_autorizacao_func', 'diaria_pre_autorizacao_func_exec'], 'integer'],
            [['diaria_pre_autorizacao_dt'], 'safe'],
            [['diaria_pre_autorizacao_hr'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diaria_pre_autorizacao_id' => 'Diaria Pre Autorizacao ID',
            'diaria_id' => 'Diaria ID',
            'diaria_pre_autorizacao_func' => 'Diaria Pre Autorizacao Func',
            'diaria_pre_autorizacao_func_exec' => 'Diaria Pre Autorizacao Func Exec',
            'diaria_pre_autorizacao_dt' => 'Diaria Pre Autorizacao Dt',
            'diaria_pre_autorizacao_hr' => 'Diaria Pre Autorizacao Hr',
        ];
    }
}
