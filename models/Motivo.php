<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.motivo".
 *
 * @property integer $motivo_id
 * @property string $motivo_ds
 * @property string $motivo_st
 * @property string $motivo_dt_criacao
 * @property string $motivo_dt_alteracao
 * @property integer $motivo_tipo_id
 *
 * @property DiariaDiariaMotivo[] $diariaDiariaMotivos
 * @property DiariaDiaria[] $diarias
 * @property DiariaMotivoTipo $motivoTipo
 */
class Motivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.motivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['motivo_ds'], 'required'],
            [['motivo_st'], 'number'],
            [['motivo_dt_criacao', 'motivo_dt_alteracao'], 'safe'],
            [['motivo_tipo_id'], 'integer'],
            [['motivo_ds'], 'string', 'max' => 100],
            [['motivo_tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaMotivoTipo::className(), 'targetAttribute' => ['motivo_tipo_id' => 'motivo_tipo_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'motivo_id' => 'Motivo ID',
            'motivo_ds' => 'Motivo Ds',
            'motivo_st' => 'Motivo St',
            'motivo_dt_criacao' => 'Motivo Dt Criacao',
            'motivo_dt_alteracao' => 'Motivo Dt Alteracao',
            'motivo_tipo_id' => 'Motivo Tipo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaMotivos()
    {
        return $this->hasMany(DiariaMotivo::className(), ['motivo_id' => 'motivo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiarias()
    {
        return $this->hasMany(Diarias::className(), ['diaria_id' => 'diaria_id'])->viaTable('diaria_motivo', ['motivo_id' => 'motivo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotivoTipo()
    {
        return $this->hasOne(DiariaMotivoTipo::className(), ['motivo_tipo_id' => 'motivo_tipo_id']);
    }
}
