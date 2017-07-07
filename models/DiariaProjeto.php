<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%diaria.projeto}}".
 *
 * @property integer $projeto_cd
 * @property string $projeto_saldo
 * @property string $projeto_ds
 * @property string $projeto_st
 * @property string $projeto_dt_criacao
 * @property string $projeto_dt_alteracao
 * @property integer $ger_id
 * @property integer $est_organizacional_id
 * @property string $convenio_dt_vencimento
 * @property integer $projeto_convenio
 *
 * @property DiariaDiaria[] $diariaDiarias
 * @property DiariaEtapa[] $diariaEtapas
 * @property DiariaProjetoAcaoTerritorio[] $diariaProjetoAcaoTerritorios
 * @property DiariaSaldoProjetoFonte[] $diariaSaldoProjetoFontes
 */
class DiariaProjeto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%diaria.projeto}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projeto_cd', 'projeto_saldo', 'projeto_ds'], 'required'],
            [['projeto_cd', 'ger_id', 'est_organizacional_id', 'projeto_convenio'], 'integer'],
            [['projeto_st'], 'number'],
            [['projeto_dt_criacao', 'projeto_dt_alteracao', 'convenio_dt_vencimento'], 'safe'],
            [['projeto_saldo'], 'string', 'max' => 16],
            [['projeto_ds'], 'string', 'max' => 350],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'projeto_cd' => 'Projeto Cd',
            'projeto_saldo' => 'Projeto Saldo',
            'projeto_ds' => 'Projeto Ds',
            'projeto_st' => 'Projeto St',
            'projeto_dt_criacao' => 'Projeto Dt Criacao',
            'projeto_dt_alteracao' => 'Projeto Dt Alteracao',
            'ger_id' => 'Ger ID',
            'est_organizacional_id' => 'Est Organizacional ID',
            'convenio_dt_vencimento' => 'Convenio Dt Vencimento',
            'projeto_convenio' => 'Projeto Convenio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiarias()
    {
        return $this->hasMany(DiariaDiaria::className(), ['projeto_cd' => 'projeto_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaEtapas()
    {
        return $this->hasMany(DiariaEtapa::className(), ['projeto_id' => 'projeto_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaProjetoAcaoTerritorios()
    {
        return $this->hasMany(DiariaProjetoAcaoTerritorio::className(), ['projeto_cd' => 'projeto_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaSaldoProjetoFontes()
    {
        return $this->hasMany(DiariaSaldoProjetoFonte::className(), ['id_saldo_projeto' => 'projeto_cd']);
    }
}
