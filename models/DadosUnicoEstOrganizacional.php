<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.est_organizacional".
 *
 * @property integer $est_organizacional_id
 * @property integer $est_organizacional_sup_cd
 * @property string $est_organizacional_ds
 * @property string $est_organizacional_sigla
 * @property string $est_organizacional_st
 * @property string $est_organizacional_dt_criacao
 * @property string $est_organizacional_dt_alteracao
 * @property string $est_organizacional_centro_custo
 * @property string $est_organizacional_centro_custo_num
 * @property integer $est_organizacional_centro_custo_transporte
 * @property integer $est_organizacional_centro_custo_acompanhamento
 * @property string $est_organizacional_unidade_executora
 *
 * @property DadosUnicoEstOrganizacionalFuncionario[] $dadosUnicoEstOrganizacionalFuncionarios
 * @property DiariaAutorizadorAcp[] $diariaAutorizadorAcps
 * @property DiariaDiaria[] $diariaDiarias
 */
class DadosUnicoEstOrganizacional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.est_organizacional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['est_organizacional_sup_cd', 'est_organizacional_centro_custo_transporte', 'est_organizacional_centro_custo_acompanhamento'], 'integer'],
            [['est_organizacional_ds', 'est_organizacional_sigla'], 'required'],
            [['est_organizacional_st', 'est_organizacional_centro_custo', 'est_organizacional_unidade_executora'], 'number'],
            [['est_organizacional_dt_criacao', 'est_organizacional_dt_alteracao'], 'safe'],
            [['est_organizacional_ds'], 'string', 'max' => 255],
            [['est_organizacional_sigla'], 'string', 'max' => 50],
            [['est_organizacional_centro_custo_num'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'est_organizacional_id' => 'Est Organizacional ID',
            'est_organizacional_sup_cd' => 'Est Organizacional Sup Cd',
            'est_organizacional_ds' => 'Est Organizacional Ds',
            'est_organizacional_sigla' => 'Est Organizacional Sigla',
            'est_organizacional_st' => 'Est Organizacional St',
            'est_organizacional_dt_criacao' => 'Est Organizacional Dt Criacao',
            'est_organizacional_dt_alteracao' => 'Est Organizacional Dt Alteracao',
            'est_organizacional_centro_custo' => 'Est Organizacional Centro Custo',
            'est_organizacional_centro_custo_num' => 'Est Organizacional Centro Custo Num',
            'est_organizacional_centro_custo_transporte' => 'Est Organizacional Centro Custo Transporte',
            'est_organizacional_centro_custo_acompanhamento' => 'Est Organizacional Centro Custo Acompanhamento',
            'est_organizacional_unidade_executora' => 'Est Organizacional Unidade Executora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoEstOrganizacionalFuncionarios()
    {
        return $this->hasMany(DadosUnicoEstOrganizacionalFuncionario::className(), ['est_organizacional_id' => 'est_organizacional_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaAutorizadorAcps()
    {
        return $this->hasMany(DiariaAutorizadorAcp::className(), ['est_organizacional_id' => 'est_organizacional_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiarias()
    {
        return $this->hasMany(DiariaDiaria::className(), ['diaria_unidade_custo' => 'est_organizacional_id']);
    }
}
