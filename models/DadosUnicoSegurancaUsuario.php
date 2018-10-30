<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguranca.usuario".
 *
 * @property int $pessoa_id
 * @property string $usuario_login
 * @property string $usuario_senha
 * @property string $usuario_st
 * @property string $usuario_dt_criacao
 * @property string $usuario_dt_alteracao
 * @property string $usuario_primeiro_logon
 * @property int $usuario_diaria
 * @property int $id_coordenadoria
 */
class DadosUnicoSegurancaUsuario extends \yii\db\ActiveRecord
{
    public $mail;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seguranca.usuario';
    }

    public function generatePassword(){
        $CaracteresAceitos = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($CaracteresAceitos)-1;
        $password = null;
        for($i=0; $i < 8; $i++)
        {
            $password.= $CaracteresAceitos{mt_rand(0, $max)};
        }
        return $password;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'usuario_login', 'usuario_senha'], 'required'],
            [['pessoa_id', 'usuario_diaria', 'id_coordenadoria'], 'default', 'value' => null],
            [['pessoa_id', 'usuario_diaria', 'id_coordenadoria'], 'integer'],
            [['usuario_st', 'usuario_primeiro_logon'], 'number'],
            [['usuario_dt_criacao', 'usuario_dt_alteracao'], 'safe'],
            [['usuario_login'], 'string', 'max' => 50],
            [['usuario_senha'], 'string', 'max' => 40],
            [['pessoa_id'], 'unique'],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pessoa_id' => 'Pessoa',
            'usuario_login' => 'Login',
            'usuario_senha' => 'Senha',
            'usuario_st' => 'Usuario St',
            'usuario_dt_criacao' => 'Usuario Dt Criacao',
            'usuario_dt_alteracao' => 'Usuario Dt Alteracao',
            'usuario_primeiro_logon' => 'Usuario Primeiro Logon',
            'usuario_diaria' => 'Usuario Diaria',
            'id_coordenadoria' => 'Coordenadoria',
            'mail' => 'Alterar Senha?',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(DadosUnicoPessoa::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioTipoUsuario()
    {
        return $this->hasMany(SegurancaUsuarioTipoUsuario::className(), ['pessoa_id' => 'pessoa_id']);
    }

}
