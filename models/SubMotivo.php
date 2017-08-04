<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.sub_motivo".
 *
 * @property integer $sub_motivo_id
 * @property string $sub_motivo_ds
 * @property string $sub_motivo_st
 * @property string $sub_motivo_dt_criacao
 * @property string $sub_motivo_dt_alteracao
 */
class SubMotivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.sub_motivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_motivo_ds'], 'required'],
            [['sub_motivo_st'], 'number'],
            [['sub_motivo_dt_criacao', 'sub_motivo_dt_alteracao'], 'safe'],
            [['sub_motivo_ds'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sub_motivo_id' => 'Sub Motivo ID',
            'sub_motivo_ds' => 'Sub Motivo Ds',
            'sub_motivo_st' => 'Sub Motivo St',
            'sub_motivo_dt_criacao' => 'Sub Motivo Dt Criacao',
            'sub_motivo_dt_alteracao' => 'Sub Motivo Dt Alteracao',
        ];
    }
}
