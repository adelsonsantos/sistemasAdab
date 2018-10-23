<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguranca.usuario_tipo_usuario".
 *
 * @property integer $pessoa_id
 * @property integer $tipo_usuario_id
 *
 * @property SegurancaTipoUsuario $tipoUsuario
 * @property DadosUnicoSegurancaUsuario $pessoa
 */
class SegurancaUsuarioTipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguranca.usuario_tipo_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'tipo_usuario_id'], 'required'],
            [['pessoa_id', 'tipo_usuario_id'], 'integer'],
            [['tipo_usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => SegurancaTipoUsuario::className(), 'targetAttribute' => ['tipo_usuario_id' => 'tipo_usuario_id']],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoSegurancaUsuario::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pessoa_id' => 'Pessoa ID',
            'tipo_usuario_id' => 'Tipo Usuario ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoUsuario()
    {
        return $this->hasOne(SegurancaTipoUsuario::className(), ['tipo_usuario_id' => 'tipo_usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(DadosUnicoSegurancaUsuario::className(), ['pessoa_id' => 'pessoa_id']);
    }
}
