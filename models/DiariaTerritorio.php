<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%diaria.territorio}}".
 *
 * @property integer $territorio_cd
 * @property string $territorio_ds
 * @property string $territorio_st
 * @property string $territorio_dt_criacao
 * @property string $territorio_dt_alteracao
 *
 * @property DiariaDiaria[] $diariaDiarias
 * @property DiariaProjetoAcaoTerritorio[] $diariaProjetoAcaoTerritorios
 */
class DiariaTerritorio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%diaria.territorio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['territorio_cd', 'territorio_ds'], 'required'],
            [['territorio_cd'], 'integer'],
            [['territorio_st'], 'number'],
            [['territorio_dt_criacao', 'territorio_dt_alteracao'], 'safe'],
            [['territorio_ds'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'territorio_cd' => 'Territorio Cd',
            'territorio_ds' => 'Territorio Ds',
            'territorio_st' => 'Territorio St',
            'territorio_dt_criacao' => 'Territorio Dt Criacao',
            'territorio_dt_alteracao' => 'Territorio Dt Alteracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiarias()
    {
        return $this->hasMany(DiariaDiaria::className(), ['territorio_cd' => 'territorio_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaProjetoAcaoTerritorios()
    {
        return $this->hasMany(DiariaProjetoAcaoTerritorio::className(), ['territorio_cd' => 'territorio_cd']);
    }
}
