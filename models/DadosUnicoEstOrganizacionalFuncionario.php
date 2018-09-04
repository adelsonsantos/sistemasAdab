<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.est_organizacional_funcionario".
 *
 * @property integer $est_organizacional_funcionario_id
 * @property integer $est_organizacional_id
 * @property integer $funcionario_id
 * @property string $est_organizacional_funcionario_dt_entrada
 * @property string $est_organizacional_funcionario_dt_saida
 * @property string $est_organizacional_funcionario_st
 *
 * @property DadosUnicoEstOrganizacional $estOrganizacional
 * @property DadosUnicoFuncionario $funcionario
 */
class DadosUnicoEstOrganizacionalFuncionario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.est_organizacional_funcionario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['est_organizacional_id', 'funcionario_id'], 'required'],
            [['est_organizacional_id', 'funcionario_id'], 'integer'],
            [['est_organizacional_funcionario_st'], 'number'],
            [['est_organizacional_funcionario_dt_entrada', 'est_organizacional_funcionario_dt_saida'], 'string', 'max' => 10],
            [['est_organizacional_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoEstOrganizacional::className(), 'targetAttribute' => ['est_organizacional_id' => 'est_organizacional_id']],
            [['funcionario_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoFuncionario::className(), 'targetAttribute' => ['funcionario_id' => 'funcionario_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'est_organizacional_funcionario_id' => 'Est Organizacional Funcionario ID',
            'est_organizacional_id' => 'Unidade de Lotação/ACP',
            'funcionario_id' => 'Funcionario ID',
            'est_organizacional_funcionario_dt_entrada' => 'Est Organizacional Funcionario Dt Entrada',
            'est_organizacional_funcionario_dt_saida' => 'Est Organizacional Funcionario Dt Saida',
            'est_organizacional_funcionario_st' => 'Est Organizacional Funcionario St',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstOrganizacional()
    {
        return $this->hasOne(DadosUnicoEstOrganizacional::className(), ['est_organizacional_id' => 'est_organizacional_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(DadosUnicoFuncionario::className(), ['funcionario_id' => 'funcionario_id']);
    }
}
