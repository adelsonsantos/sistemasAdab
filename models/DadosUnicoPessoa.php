<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "dados_unico.pessoa".
 *
 * @property integer $pessoa_id
 * @property string $pessoa_nm
 * @property string $pessoa_tipo
 * @property string $pessoa_email
 * @property string $pessoa_st
 * @property string $pessoa_dt_criacao
 * @property string $pessoa_dt_alteracao
 *
 */
class DadosUnicoPessoa extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.pessoa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_tipo'], 'required'],
            [['pessoa_st'], 'number'],
            [['pessoa_dt_criacao', 'pessoa_dt_alteracao'], 'safe'],
            [['pessoa_nm', 'pessoa_email'], 'string', 'max' => 200],
            [['pessoa_tipo'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pessoa_id'             => 'DadosUnicoPessoa ID',
            'pessoa_nm'             => 'Nome',
            'pessoa_tipo'           => 'DadosUnicoPessoa Tipo',
            'pessoa_email'          => 'E-mail',
            'pessoa_st'             => 'DadosUnicoPessoa St',
            'pessoa_dt_criacao'     => 'DadosUnicoPessoa Dt Criacao',
            'pessoa_dt_alteracao'   => 'DadosUnicoPessoa Dt Alteracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoDadosUser()
    {
        return $this->hasOne(User::className(), ['pessoa_id' => 'pessoa_id']);
    }

    public function getUserNameById($id)
    {
        return self::findAll([
            'pessoa_id' => $id
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoDadosBancarios()
    {
        return $this->hasMany(DadosUnicoDadosBancarios::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoEnderecos()
    {
        return $this->hasMany(DadosUnicoEndereco::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoLogEventos()
    {
        return $this->hasMany(DadosUnicoLogEvento::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoLogFuncionarios()
    {
        return $this->hasMany(DadosUnicoLogFuncionario::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoPessoaFisica()
    {
        return $this->hasOne(DadosUnicoPessoaFisica::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoPessoaJuridica()
    {
        return $this->hasOne(DadosUnicoPessoaJuridica::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoTelefones()
    {
        return $this->hasMany(DadosUnicoTelefone::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiarias()
    {
        return $this->hasMany(Diarias::className(), ['diaria_solicitante' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiarias0()
    {
        return $this->hasMany(Diarias::className(), ['diaria_beneficiario' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaComprovacaos()
    {
        return $this->hasMany(DiariaDiariaComprovacao::className(), ['diaria_comprovacao_comprovador' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaLogs()
    {
        return $this->hasMany(DiariaDiariaLog::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegurancaUsuario()
    {
        return $this->hasOne(SegurancaUsuario::className(), ['pessoa_id' => 'pessoa_id']);
    }
}
