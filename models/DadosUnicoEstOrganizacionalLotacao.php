<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.est_organizacional_lotacao".
 *
 * @property int $est_organizacional_lotacao_id
 * @property int $est_organizacional_lotacao_sup_cd
 * @property string $est_organizacional_lotacao_ds
 * @property string $est_organizacional_lotacao_sigla
 * @property string $est_organizacional_lotacao_st
 * @property string $est_organizacional_lotacao_dt_criacao
 * @property string $est_organizacional_lotacao_dt_alteracao
 */
class DadosUnicoEstOrganizacionalLotacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.est_organizacional_lotacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['est_organizacional_lotacao_sup_cd'], 'default', 'value' => null],
            [['est_organizacional_lotacao_sup_cd'], 'integer'],
            [['est_organizacional_lotacao_ds', 'est_organizacional_lotacao_sigla'], 'required'],
            [['est_organizacional_lotacao_st'], 'number'],
            [['est_organizacional_lotacao_dt_criacao', 'est_organizacional_lotacao_dt_alteracao'], 'safe'],
            [['est_organizacional_lotacao_ds'], 'string', 'max' => 255],
            [['est_organizacional_lotacao_sigla'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'est_organizacional_lotacao_id' => 'Est Organizacional Lotacao ID',
            'est_organizacional_lotacao_sup_cd' => 'Est Organizacional Lotacao Sup Cd',
            'est_organizacional_lotacao_ds' => 'Est Organizacional Lotacao Ds',
            'est_organizacional_lotacao_sigla' => 'Est Organizacional Lotacao Sigla',
            'est_organizacional_lotacao_st' => 'Est Organizacional Lotacao St',
            'est_organizacional_lotacao_dt_criacao' => 'Est Organizacional Lotacao Dt Criacao',
            'est_organizacional_lotacao_dt_alteracao' => 'Est Organizacional Lotacao Dt Alteracao',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosUnicoEstOrganizacionalLotacaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosUnicoEstOrganizacionalLotacaoQuery(get_called_class());
    }
}
