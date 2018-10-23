<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.pessoa_status".
 *
 * @property int $pessoa_st
 * @property string $pessoa_descricao
 */
class DadosUnicoPessoaStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dados_unico.pessoa_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pessoa_descricao'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pessoa_st' => 'Pessoa St',
            'pessoa_descricao' => 'Pessoa Descricao',
        ];
    }
}
