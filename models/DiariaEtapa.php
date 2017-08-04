<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.etapa".
 *
 * @property integer $etapa_id
 * @property string $etapa_ds
 * @property integer $projeto_id
 * @property double $saldo_superior
 * @property double $saldo_medio
 * @property integer $etapa_st
 * @property string $etapa_codigo
 * @property string $fonte_id
 * @property string $etapa_data_criacao
 * @property string $etapa_data_atualizacao
 * @property string $etapa_meta
 * @property double $saldo_superior_inicio
 * @property double $saldo_medio_inicio
 *
 * @property DiariaFonte $fonte
 * @property DiariaProjeto $projeto
 */
class DiariaEtapa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.etapa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projeto_id', 'etapa_st'], 'integer'],
            [['saldo_superior', 'saldo_medio', 'saldo_superior_inicio', 'saldo_medio_inicio'], 'number'],
            [['etapa_data_criacao', 'etapa_data_atualizacao'], 'safe'],
            [['etapa_ds'], 'string', 'max' => 500],
            [['etapa_codigo', 'etapa_meta'], 'string', 'max' => 10],
            [['fonte_id'], 'string', 'max' => 15],
            [['fonte_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaFonte::className(), 'targetAttribute' => ['fonte_id' => 'fonte_cd']],
            [['projeto_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaProjeto::className(), 'targetAttribute' => ['projeto_id' => 'projeto_cd']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'etapa_id' => 'Etapa ID',
            'etapa_ds' => 'Etapa Ds',
            'projeto_id' => 'Projeto ID',
            'saldo_superior' => 'Saldo Superior',
            'saldo_medio' => 'Saldo Medio',
            'etapa_st' => 'Etapa St',
            'etapa_codigo' => 'Etapa Codigo',
            'fonte_id' => 'Fonte ID',
            'etapa_data_criacao' => 'Etapa Data Criacao',
            'etapa_data_atualizacao' => 'Etapa Data Atualizacao',
            'etapa_meta' => 'Etapa Meta',
            'saldo_superior_inicio' => 'Saldo Superior Inicio',
            'saldo_medio_inicio' => 'Saldo Medio Inicio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFonte()
    {
        return $this->hasOne(DiariaFonte::className(), ['fonte_cd' => 'fonte_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjeto()
    {
        return $this->hasOne(DiariaProjeto::className(), ['projeto_cd' => 'projeto_id']);
    }
}
