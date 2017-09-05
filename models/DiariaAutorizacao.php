<?php

namespace app\models;

/**
 * This is the model class for table "diaria.diaria_autorizacao".
 *
 * @property integer $diaria_autorizacao_id
 * @property integer $diaria_id
 * @property integer $diaria_autorizacao_func
 * @property integer $diaria_autorizacao_func_exec
 * @property string $diaria_autorizacao_dt
 * @property string $diaria_autorizacao_hr
 *
 * @property Diarias $diaria
 */
class DiariaAutorizacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.diaria_autorizacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'diaria_autorizacao_func', 'diaria_autorizacao_dt', 'diaria_autorizacao_hr'], 'required'],
            [['diaria_id', 'diaria_autorizacao_func', 'diaria_autorizacao_func_exec'], 'integer'],
            [['diaria_autorizacao_dt'], 'safe'],
            [['diaria_autorizacao_hr'], 'string', 'max' => 10],
            [['diaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diarias::className(), 'targetAttribute' => ['diaria_id' => 'diaria_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diaria_autorizacao_id' => 'Diaria Autorizacao ID',
            'diaria_id' => 'Diaria ID',
            'diaria_autorizacao_func' => 'Diaria Autorizacao Func',
            'diaria_autorizacao_func_exec' => 'Diaria Autorizacao Func Exec',
            'diaria_autorizacao_dt' => 'Diaria Autorizacao Dt',
            'diaria_autorizacao_hr' => 'Diaria Autorizacao Hr',
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
    public function getFuncionario()
    {
        return $this->hasOne(DadosUnicoFuncionario::className(), ['funcionario_id' => 'diaria_autorizacao_func']);
    }
}
