<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.roteiro".
 *
 * @property integer $roteiro_id
 * @property integer $diaria_id
 * @property integer $roteiro_origem
 * @property integer $roteiro_destino
 * @property integer $controle_roteiro
 * @property integer $dados_roteiro_id
 *
 * @property DiariaDiaria $diaria
 */
class DiariaRoteiro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.roteiro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diaria_id', 'roteiro_origem', 'roteiro_destino'], 'required'],
            [['diaria_id', 'roteiro_origem', 'roteiro_destino', 'controle_roteiro', 'dados_roteiro_id'], 'integer'],
            [['diaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiariaDiaria::className(), 'targetAttribute' => ['diaria_id' => 'diaria_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roteiro_id' => 'Roteiro ID',
            'diaria_id' => 'Diaria ID',
            'roteiro_origem' => 'Roteiro Origem',
            'roteiro_destino' => 'Roteiro Destino',
            'controle_roteiro' => 'Controle Roteiro',
            'dados_roteiro_id' => 'Dados Roteiro ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaria()
    {
        return $this->hasOne(DiariaDiaria::className(), ['diaria_id' => 'diaria_id']);
    }
}
