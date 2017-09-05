<?php

namespace app\models;

/**
 * This is the model class for table "seguranca.tipo_usuario".
 *
 * @property integer $tipo_usuario_id
 * @property string $tipo_usuario_ds
 * @property string $tipo_usuario_st
 * @property integer $sistema_id
 *
 * @property SegurancaSistema $sistema
 * @property SegurancaUsuarioTipoUsuario[] $segurancaUsuarioTipoUsuarios
 * @property SegurancaUsuario[] $pessoas
 */
class SegurancaTipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguranca.tipo_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_usuario_ds', 'sistema_id'], 'required'],
            [['tipo_usuario_st'], 'number'],
            [['sistema_id'], 'integer'],
            [['tipo_usuario_ds'], 'string', 'max' => 50],
            [['sistema_id'], 'exist', 'skipOnError' => true, 'targetClass' => SegurancaSistema::className(), 'targetAttribute' => ['sistema_id' => 'sistema_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_usuario_id' => 'Tipo Usuario ID',
            'tipo_usuario_ds' => 'Tipo Usuario Ds',
            'tipo_usuario_st' => 'Tipo Usuario St',
            'sistema_id' => 'Sistema ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistema()
    {
        return $this->hasOne(SegurancaSistema::className(), ['sistema_id' => 'sistema_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegurancaUsuarioTipoUsuarios()
    {
        return $this->hasMany(SegurancaUsuarioTipoUsuario::className(), ['tipo_usuario_id' => 'tipo_usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoas()
    {
        return $this->hasMany(SegurancaUsuario::className(), ['pessoa_id' => 'pessoa_id'])->viaTable('usuario_tipo_usuario', ['tipo_usuario_id' => 'tipo_usuario_id']);
    }
}
