<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.orgao".
 *
 * @property int $orgao_id
 * @property string $orgao_ds
 * @property string $orgao_st
 * @property string $orgao_dt_criacao
 * @property string $orgao_dt_alteracao
 */
class DadosUnicoOrgao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.orgao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orgao_st'], 'number'],
            [['orgao_dt_criacao', 'orgao_dt_alteracao'], 'safe'],
            [['orgao_ds'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orgao_id' => 'Orgao ID',
            'orgao_ds' => 'Orgao Ds',
            'orgao_st' => 'Orgao St',
            'orgao_dt_criacao' => 'Orgao Dt Criacao',
            'orgao_dt_alteracao' => 'Orgao Dt Alteracao',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosUnicoOrgaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosUnicoOrgaoQuery(get_called_class());
    }
}
