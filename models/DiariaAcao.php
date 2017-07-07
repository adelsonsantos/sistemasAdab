<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.acao".
 *
 * @property integer $acao_cd
 * @property string $acao_tipo
 * @property string $acao_ds
 * @property string $acao_st
 * @property string $acao_dt_criacao
 * @property string $acao_dt_alteracao
 *
 * @property DiariaDiaria[] $diariaDiarias
 * @property DiariaProjetoAcaoTerritorio[] $diariaProjetoAcaoTerritorios
 */
class DiariaAcao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.acao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acao_cd', 'acao_tipo', 'acao_ds'], 'required'],
            [['acao_cd'], 'integer'],
            [['acao_st'], 'number'],
            [['acao_dt_criacao', 'acao_dt_alteracao'], 'safe'],
            [['acao_tipo'], 'string', 'max' => 16],
            [['acao_ds'], 'string', 'max' => 350],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'acao_cd' => 'Acao Cd',
            'acao_tipo' => 'Acao Tipo',
            'acao_ds' => 'Acao Ds',
            'acao_st' => 'Acao St',
            'acao_dt_criacao' => 'Acao Dt Criacao',
            'acao_dt_alteracao' => 'Acao Dt Alteracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiarias()
    {
        return $this->hasMany(DiariaDiaria::className(), ['acao_cd' => 'acao_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaProjetoAcaoTerritorios()
    {
        return $this->hasMany(DiariaProjetoAcaoTerritorio::className(), ['acao_cd' => 'acao_cd']);
    }
}
