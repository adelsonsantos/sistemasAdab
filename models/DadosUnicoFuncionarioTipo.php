<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.funcionario_tipo".
 *
 * @property integer $funcionario_tipo_id
 * @property string $funcionario_tipo_ds
 * @property string $funcionario_tipo_terceirizado
 *
 * @property DadosUnicoCargo[] $dadosUnicoCargos
 * @property DadosUnicoFuncionario[] $dadosUnicoFuncionarios
 */
class DadosUnicoFuncionarioTipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.funcionario_tipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['funcionario_tipo_ds'], 'required'],
            [['funcionario_tipo_terceirizado'], 'number'],
            [['funcionario_tipo_ds'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'funcionario_tipo_id' => 'Funcionario Tipo ID',
            'funcionario_tipo_ds' => 'Funcionario Tipo Ds',
            'funcionario_tipo_terceirizado' => 'Funcionario Tipo Terceirizado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoCargos()
    {
        return $this->hasMany(DadosUnicoCargo::className(), ['funcionario_tipo_id' => 'funcionario_tipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoFuncionarios()
    {
        return $this->hasMany(DadosUnicoFuncionario::className(), ['funcionario_tipo_id' => 'funcionario_tipo_id']);
    }
}
