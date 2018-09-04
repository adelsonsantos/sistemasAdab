<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.funcionario_arquivo".
 *
 * @property int $funcionario_id
 * @property string $documento
 * @property string $pasta
 * @property string $armario
 * @property string $gaveta
 * @property string $posicao
 */
class DadosUnicoFuncionarioArquivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.funcionario_arquivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['funcionario_id'], 'default', 'value' => null],
            [['funcionario_id'], 'integer'],
            [['documento', 'armario'], 'string', 'max' => 80],
            [['pasta', 'gaveta', 'posicao'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'funcionario_id' => 'Funcionario ID',
            'documento' => 'Documento',
            'pasta' => 'Pasta',
            'armario' => 'Armario Num ou Nome',
            'gaveta' => 'Gaveta',
            'posicao' => 'Posição',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosUnicoFuncionarioArquivoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosUnicoFuncionarioArquivoQuery(get_called_class());
    }
}
