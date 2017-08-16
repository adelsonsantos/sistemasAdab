<?php

namespace app\models;

/**
 * This is the model class for table "diaria.diaria_aprovacao".
 *
 * @property integer $diaria_aprovacao_id
 * @property integer $diaria_id
 * @property integer $diaria_aprovacao_func
 * @property integer $diaria_aprovacao_func_exec
 * @property string $diaria_aprovacao_dt
 * @property string $diaria_aprovacao_hr
 * @property integer $diaria_imprimir_processo
 * @property integer $imp_processo_st
 * @property boolean $aprovacao_final
 *
 * @property Diarias $diaria
 */
class DiariaAprovacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.diaria_aprovacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'diaria_aprovacao_func', 'diaria_aprovacao_dt', 'diaria_aprovacao_hr'], 'required'],
            [['diaria_id', 'diaria_aprovacao_func', 'diaria_aprovacao_func_exec', 'diaria_imprimir_processo', 'imp_processo_st'], 'integer'],
            [['diaria_aprovacao_dt'], 'safe'],
            [['aprovacao_final'], 'boolean'],
            [['diaria_aprovacao_hr'], 'string', 'max' => 10],
            [['diaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diarias::className(), 'targetAttribute' => ['diaria_id' => 'diaria_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diaria_aprovacao_id' => 'Diaria Aprovacao ID',
            'diaria_id' => 'Diaria ID',
            'diaria_aprovacao_func' => 'Diaria Aprovacao Func',
            'diaria_aprovacao_func_exec' => 'Diaria Aprovacao Func Exec',
            'diaria_aprovacao_dt' => 'Diaria Aprovacao Dt',
            'diaria_aprovacao_hr' => 'Diaria Aprovacao Hr',
            'diaria_imprimir_processo' => 'Diaria Imprimir Processo',
            'imp_processo_st' => 'Imp Processo St',
            'aprovacao_final' => 'Aprovacao Final',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaria()
    {
        return $this->hasOne(Diarias::className(), ['diaria_id' => 'diaria_id']);
    }
}
