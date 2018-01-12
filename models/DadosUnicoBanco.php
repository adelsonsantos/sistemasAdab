<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.banco".
 *
 * @property integer $banco_id
 * @property string $banco_cd
 * @property string $banco_ds
 * @property string $banco_st
 * @property string $banco_dt_criacao
 * @property string $banco_dt_alteracao
 *
 * @property DadosUnicoDadosBancarios[] $dadosUnicoDadosBancarios
 */
class DadosUnicoBanco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.banco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['banco_cd', 'banco_ds'], 'required'],
            [['banco_st'], 'number'],
            [['banco_dt_criacao', 'banco_dt_alteracao'], 'safe'],
            [['banco_cd'], 'string', 'max' => 3],
            [['banco_ds'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'banco_id' => 'Banco ID',
            'banco_cd' => 'Banco Cd',
            'banco_ds' => 'Banco Ds',
            'banco_st' => 'Banco St',
            'banco_dt_criacao' => 'Banco Dt Criacao',
            'banco_dt_alteracao' => 'Banco Dt Alteracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoDadosBancarios()
    {
        return $this->hasMany(DadosUnicoDadosBancarios::className(), ['banco_id' => 'banco_id']);
    }
}
