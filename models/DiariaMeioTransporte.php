<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%diaria.meio_transporte}}".
 *
 * @property integer $meio_transporte_id
 * @property string $meio_transporte_ds
 * @property string $meio_transporte_st
 * @property string $meio_transporte_dt_criacao
 * @property string $meio_transporte_dt_alteracao
 *
 * @property DiariaDiaria[] $diariaDiarias
 */
class DiariaMeioTransporte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%diaria.meio_transporte}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meio_transporte_ds'], 'required'],
            [['meio_transporte_st'], 'number'],
            [['meio_transporte_dt_criacao', 'meio_transporte_dt_alteracao'], 'safe'],
            [['meio_transporte_ds'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'meio_transporte_id' => 'Meio Transporte ID',
            'meio_transporte_ds' => 'Meio Transporte Ds',
            'meio_transporte_st' => 'Meio Transporte St',
            'meio_transporte_dt_criacao' => 'Meio Transporte Dt Criacao',
            'meio_transporte_dt_alteracao' => 'Meio Transporte Dt Alteracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiarias()
    {
        return $this->hasMany(DiariaDiaria::className(), ['meio_transporte_id' => 'meio_transporte_id']);
    }
}
