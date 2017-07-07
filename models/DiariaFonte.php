<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%diaria.fonte}}".
 *
 * @property string $fonte_cd
 * @property string $fonte_ds
 * @property string $fonte_st
 * @property string $fonte_dt_criacao
 * @property string $fonte_dt_alteracao
 * @property integer $fonte_padrao
 *
 * @property DiariaDiaria[] $diariaDiarias
 * @property DiariaEtapa[] $diariaEtapas
 * @property DiariaSaldoProjetoFonte[] $diariaSaldoProjetoFontes
 */
class DiariaFonte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%diaria.fonte}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fonte_cd', 'fonte_ds'], 'required'],
            [['fonte_st'], 'number'],
            [['fonte_dt_criacao', 'fonte_dt_alteracao'], 'safe'],
            [['fonte_padrao'], 'integer'],
            [['fonte_cd'], 'string', 'max' => 10],
            [['fonte_ds'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fonte_cd' => 'Fonte Cd',
            'fonte_ds' => 'Fonte Ds',
            'fonte_st' => 'Fonte St',
            'fonte_dt_criacao' => 'Fonte Dt Criacao',
            'fonte_dt_alteracao' => 'Fonte Dt Alteracao',
            'fonte_padrao' => 'Fonte Padrao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiarias()
    {
        return $this->hasMany(DiariaDiaria::className(), ['fonte_cd' => 'fonte_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaEtapas()
    {
        return $this->hasMany(DiariaEtapa::className(), ['fonte_id' => 'fonte_cd']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaSaldoProjetoFontes()
    {
        return $this->hasMany(DiariaSaldoProjetoFonte::className(), ['id_saldo_fonte' => 'fonte_cd']);
    }
}
