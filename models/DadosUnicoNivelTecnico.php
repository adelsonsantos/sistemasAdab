<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.nivel_tecnico".
 *
 * @property int $nivel_tecnico_id
 * @property int $pessoa_id
 * @property string $nivel_tecnico_curso_ds
 * @property string $nivel_tecnico_instituicao_ds
 * @property string $nivel_tecnico_conselho
 * @property string $nivel_tecnico_semestre
 */
class DadosUnicoNivelTecnico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.nivel_tecnico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id'], 'required'],
            [['pessoa_id'], 'default', 'value' => null],
            [['pessoa_id'], 'integer'],
            [['nivel_tecnico_curso_ds', 'nivel_tecnico_conselho'], 'string', 'max' => 50],
            [['nivel_tecnico_instituicao_ds'], 'string', 'max' => 80],
            [['nivel_tecnico_semestre'], 'string', 'max' => 2],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoaFisica::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nivel_tecnico_id' => 'Nivel Tecnico ID',
            'pessoa_id' => 'Pessoa ID',
            'nivel_tecnico_curso_ds' => 'Nome do Curso',
            'nivel_tecnico_instituicao_ds' => 'Nome da Instituição',
            'nivel_tecnico_conselho' => 'Conselho/Numero',
            'nivel_tecnico_semestre' => 'Semestre',
        ];
    }

    /**
     * @inheritdoc
     * @return DadosUnicoNivelTecnicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DadosUnicoNivelTecnicoQuery(get_called_class());
    }
}
