<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.cargo".
 *
 * @property integer $cargo_id
 * @property string $cargo_ds
 * @property string $cargo_st
 * @property string $cargo_dt_criacao
 * @property string $cargo_dt_alteracao
 * @property integer $funcionario_tipo_id
 * @property integer $classe_id
 *
 * @property DadosUnicoFuncionarioTipo $funcionarioTipo
 * @property DiariaClasse $classe
 * @property DadosUnicoCargoComissao[] $dadosUnicoCargoComissaos
 * @property DadosUnicoFuncionario[] $dadosUnicoFuncionarios
 * @property DadosUnicoFuncionario[] $dadosUnicoFuncionarios0
 */
class DadosUnicoCargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.cargo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo_ds'], 'required'],
            [['cargo_st'], 'number'],
            [['cargo_dt_criacao', 'cargo_dt_alteracao'], 'safe'],
            [['funcionario_tipo_id', 'classe_id'], 'integer'],
            [['cargo_ds'], 'string', 'max' => 100],
            [['funcionario_tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoFuncionarioTipo::className(), 'targetAttribute' => ['funcionario_tipo_id' => 'funcionario_tipo_id']],
            [['classe_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaClasse::className(), 'targetAttribute' => ['classe_id' => 'classe_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cargo_id' => 'Cargo ID',
            'cargo_ds' => 'Cargo Ds',
            'cargo_st' => 'Cargo St',
            'cargo_dt_criacao' => 'Cargo Dt Criacao',
            'cargo_dt_alteracao' => 'Cargo Dt Alteracao',
            'funcionario_tipo_id' => 'Funcionario Tipo ID',
            'classe_id' => 'Classe ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioTipo()
    {
        return $this->hasOne(DadosUnicoFuncionarioTipo::className(), ['funcionario_tipo_id' => 'funcionario_tipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasse()
    {
        return $this->hasOne(DiariaClasse::className(), ['classe_id' => 'classe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoCargoComissaos()
    {
        return $this->hasMany(DadosUnicoCargoComissao::className(), ['cargo_id' => 'cargo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoFuncionarios()
    {
        return $this->hasMany(DadosUnicoFuncionario::className(), ['cargo_permanente' => 'cargo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoFuncionarios0()
    {
        return $this->hasMany(DadosUnicoFuncionario::className(), ['cargo_temporario' => 'cargo_id']);
    }
}
