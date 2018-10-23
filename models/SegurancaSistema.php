<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguranca.sistema".
 *
 * @property int $sistema_id
 * @property string $sistema_nm
 * @property string $sistema_ds
 * @property string $sistema_icone
 * @property string $sistema_st
 * @property string $sistema_dt_criacao
 * @property string $sistema_dt_alteracao
 * @property string $sistema_url
 */
class SegurancaSistema extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seguranca.sistema';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sistema_nm', 'sistema_dt_criacao'], 'required'],
            [['sistema_st'], 'number'],
            [['sistema_dt_criacao', 'sistema_dt_alteracao'], 'safe'],
            [['sistema_nm', 'sistema_icone', 'sistema_url'], 'string', 'max' => 50],
            [['sistema_ds'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sistema_id' => 'Sistema ID',
            'sistema_nm' => 'Sistema Nm',
            'sistema_ds' => 'Sistema Ds',
            'sistema_icone' => 'Sistema Icone',
            'sistema_st' => 'Sistema St',
            'sistema_dt_criacao' => 'Sistema Dt Criacao',
            'sistema_dt_alteracao' => 'Sistema Dt Alteracao',
            'sistema_url' => 'Sistema Url',
        ];
    }
}
