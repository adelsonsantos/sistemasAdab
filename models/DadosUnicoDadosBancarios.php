<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.dados_bancarios".
 *
 * @property integer $dados_bancarios_id
 * @property integer $pessoa_id
 * @property integer $banco_id
 * @property string $dados_bancarios_agencia
 * @property string $dados_bancarios_conta
 * @property string $dados_bancarios_conta_tipo
 * @property string $dados_bancarios_principal
 * @property string $dados_bancarios_st
 * @property string $dados_bancarios_dt_criacao
 * @property string $dados_bancarios_dt_alteracao
 *
 * @property DadosUnicoBanco $banco
 * @property DadosUnicoPessoa $pessoa
 */
class DadosUnicoDadosBancarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.dados_bancarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'banco_id', 'dados_bancarios_agencia', 'dados_bancarios_conta', 'dados_bancarios_conta_tipo'], 'required'],
            [['pessoa_id', 'banco_id'], 'integer'],
            [['dados_bancarios_principal', 'dados_bancarios_st'], 'number'],
            [['dados_bancarios_dt_criacao', 'dados_bancarios_dt_alteracao'], 'safe'],
            [['dados_bancarios_agencia', 'dados_bancarios_conta'], 'string', 'max' => 10],
            [['dados_bancarios_conta_tipo'], 'string', 'max' => 1],
            [['banco_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoBanco::className(), 'targetAttribute' => ['banco_id' => 'banco_id']],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dados_bancarios_id' => 'Dados Bancarios ID',
            'pessoa_id' => 'Pessoa ID',
            'banco_id' => 'Banco ID',
            'dados_bancarios_agencia' => 'Dados Bancarios Agencia',
            'dados_bancarios_conta' => 'Dados Bancarios Conta',
            'dados_bancarios_conta_tipo' => 'Dados Bancarios Conta Tipo',
            'dados_bancarios_principal' => 'Dados Bancarios Principal',
            'dados_bancarios_st' => 'Dados Bancarios St',
            'dados_bancarios_dt_criacao' => 'Dados Bancarios Dt Criacao',
            'dados_bancarios_dt_alteracao' => 'Dados Bancarios Dt Alteracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanco()
    {
        return $this->hasOne(DadosUnicoBanco::className(), ['banco_id' => 'banco_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(DadosUnicoPessoa::className(), ['pessoa_id' => 'pessoa_id']);
    }
}
