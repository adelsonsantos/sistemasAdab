<?php

namespace app\models;

/**
 * This is the model class for table "diaria.roteiro".
 *
 * @property integer $roteiro_id
 * @property integer $diaria_id
 * @property integer $roteiro_origem
 * @property integer $roteiro_destino
 * @property integer $controle_roteiro
 * @property integer $dados_roteiro_id
 * @property string  $uf_roteiro_origem
 * @property string  $uf_roteiro_destino
 *
 * @property Diarias $diaria
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
            [['uf_roteiro_destino', 'uf_roteiro_destino'], 'string', 'max' => 2],
            [['roteiro_origem', 'comparaRoteiro'], 'safe'],
            [['diaria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diarias::className(), 'targetAttribute' => ['diaria_id' => 'diaria_id']],
        ];
    }

    public function comparaRoteiro($attribute)
    {
        if ($attribute == $this->roteiro_destino) {
            $this->addError($attribute,'ORIGEM e DESTINO são iguais.');
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roteiro_id' => 'Roteiro ID',
            'diaria_id' => 'Diaria ID',
            'roteiro_origem' => '',
            'roteiro_destino' => '',
            'uf_roteiro_origem' => '',
            'uf_roteiro_destino' => '',
            'controle_roteiro' => 'Controle Roteiro',
            'dados_roteiro_id' => 'Dados Roteiro ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaria()
    {
        return $this->hasOne(Diarias::className(), ['diaria_id' => 'diaria_id']);
    }
}
