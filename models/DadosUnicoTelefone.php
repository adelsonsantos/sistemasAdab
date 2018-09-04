<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.telefone".
 *
 * @property int $telefone_id
 * @property int $pessoa_id
 * @property string $telefone_num
 * @property string $telefone_ddd
 * @property string $telefone_tipo
 */
class DadosUnicoTelefone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.telefone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['pessoa_id', 'telefone_num', 'telefone_ddd', 'telefone_tipo'], 'required'],
            [['pessoa_id'], 'default', 'value' => null],
            [['pessoa_id'], 'integer'],
            [['telefone_num'], 'string', 'max' => 9],
            [['telefone_ddd'], 'string', 'max' => 2],
            [['telefone_tipo'], 'string', 'max' => 1],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'telefone_id' => 'Telefone ID',
            'pessoa_id' => 'Pessoa ID',
            'telefone_num' => 'Número',
            'telefone_ddd' => 'DDD',
            'telefone_tipo' => 'Telefone Tipo',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosUnicoTelefoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosUnicoTelefoneQuery(get_called_class());
    }
}
