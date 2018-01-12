<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.nivel_escolar".
 *
 * @property integer $nivel_escolar_id
 * @property string $nivel_escolar_ds
 * @property string $nivel_escolar_st
 * @property string $nivel_escolar_dt_criacao
 * @property string $nivel_escolar_dt_alteracao
 *
 * @property DadosUnicoPessoaFisica[] $dadosUnicoPessoaFisicas
 */
class DadosUnicoNivelEscolar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.nivel_escolar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nivel_escolar_st'], 'number'],
            [['nivel_escolar_dt_criacao', 'nivel_escolar_dt_alteracao'], 'safe'],
            [['nivel_escolar_ds'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nivel_escolar_id' => 'Nivel Escolar ID',
            'nivel_escolar_ds' => 'Nivel Escolar Ds',
            'nivel_escolar_st' => 'Nivel Escolar St',
            'nivel_escolar_dt_criacao' => 'Nivel Escolar Dt Criacao',
            'nivel_escolar_dt_alteracao' => 'Nivel Escolar Dt Alteracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoPessoaFisicas()
    {
        return $this->hasMany(DadosUnicoPessoaFisica::className(), ['nivel_escolar_id' => 'nivel_escolar_id']);
    }
}
