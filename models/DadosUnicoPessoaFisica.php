<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_unico.pessoa_fisica".
 *
 * @property integer $pessoa_id
 * @property string $pessoa_fisica_sexo
 * @property string $pessoa_fisica_cpf
 * @property string $pessoa_fisica_dt_nasc
 * @property string $pessoa_fisica_rg
 * @property string $pessoa_fisica_rg_orgao
 * @property string $pessoa_fisica_rg_uf
 * @property string $pessoa_fisica_rg_dt
 * @property string $pessoa_fisica_passaporte
 * @property string $pessoa_fisica_nm_pai
 * @property string $pessoa_fisica_nm_mae
 * @property string $pessoa_fisica_grupo_sanguineo
 * @property string $pessoa_fisica_nacionalidade
 * @property string $pessoa_fisica_naturalidade
 * @property string $pessoa_fisica_naturalidade_uf
 * @property string $pessoa_fisica_clt
 * @property string $pessoa_fisica_clt_serie
 * @property string $pessoa_fisica_clt_uf
 * @property string $pessoa_fisica_titulo
 * @property string $pessoa_fisica_titulo_zona
 * @property string $pessoa_fisica_titulo_secao
 * @property string $pessoa_fisica_titulo_cidade
 * @property string $pessoa_fisica_titulo_uf
 * @property string $pessoa_fisica_cnh
 * @property string $pessoa_fisica_cnh_categoria
 * @property string $pessoa_fisica_cnh_validade
 * @property string $pessoa_fisica_reservista
 * @property string $pessoa_fisica_reservista_ministerio
 * @property string $pessoa_fisica_reservista_uf
 * @property string $pessoa_fisica_pis
 * @property integer $estado_civil_id
 * @property integer $nivel_escolar_id
 * @property string $pessoa_fisica_funcionario
 * @property string $pessoa_fisica_filho
 * @property string $pessoa_fisica_filha
 * @property string $pessoa_fisica_cnh_lente_corretiva
 *
 * @property DadosUnicoFuncionario[] $dadosUnicoFuncionarios
 * @property DadosUnicoNivelTecnico[] $dadosUnicoNivelTecnicos
 * @property DadosUnicoEstadoCivil $estadoCivil
 * @property DadosUnicoNivelEscolar $nivelEscolar
 * @property DadosUnicoPessoa $pessoa
 */
class DadosUnicoPessoaFisica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.pessoa_fisica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'pessoa_fisica_cpf'], 'required'],
            [['pessoa_id', 'estado_civil_id', 'nivel_escolar_id'], 'integer'],
            [['pessoa_fisica_funcionario'], 'number'],
            [['pessoa_fisica_sexo', 'pessoa_fisica_cnh_lente_corretiva'], 'string', 'max' => 1],
            [['pessoa_fisica_cpf', 'pessoa_fisica_rg', 'pessoa_fisica_clt', 'pessoa_fisica_titulo', 'pessoa_fisica_titulo_zona', 'pessoa_fisica_titulo_secao', 'pessoa_fisica_cnh', 'pessoa_fisica_reservista', 'pessoa_fisica_reservista_ministerio'], 'string', 'max' => 20],
            [['pessoa_fisica_dt_nasc', 'pessoa_fisica_rg_dt', 'pessoa_fisica_naturalidade', 'pessoa_fisica_clt_serie', 'pessoa_fisica_titulo_cidade', 'pessoa_fisica_cnh_validade'], 'string', 'max' => 10],
            [['pessoa_fisica_rg_orgao', 'pessoa_fisica_passaporte', 'pessoa_fisica_nacionalidade', 'pessoa_fisica_pis'], 'string', 'max' => 50],
            [['pessoa_fisica_rg_uf', 'pessoa_fisica_naturalidade_uf', 'pessoa_fisica_clt_uf', 'pessoa_fisica_titulo_uf', 'pessoa_fisica_cnh_categoria', 'pessoa_fisica_reservista_uf', 'pessoa_fisica_filho', 'pessoa_fisica_filha'], 'string', 'max' => 2],
            [['pessoa_fisica_nm_pai', 'pessoa_fisica_nm_mae'], 'string', 'max' => 255],
            [['pessoa_fisica_grupo_sanguineo'], 'string', 'max' => 3],
            [['estado_civil_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoEstadoCivil::className(), 'targetAttribute' => ['estado_civil_id' => 'estado_civil_id']],
            [['nivel_escolar_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoNivelEscolar::className(), 'targetAttribute' => ['nivel_escolar_id' => 'nivel_escolar_id']],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pessoa_id' => 'DadosUnicoPessoa ID',
            'pessoa_fisica_sexo' => 'DadosUnicoPessoa Fisica Sexo',
            'pessoa_fisica_cpf' => 'DadosUnicoPessoa Fisica Cpf',
            'pessoa_fisica_dt_nasc' => 'DadosUnicoPessoa Fisica Dt Nasc',
            'pessoa_fisica_rg' => 'DadosUnicoPessoa Fisica Rg',
            'pessoa_fisica_rg_orgao' => 'DadosUnicoPessoa Fisica Rg Orgao',
            'pessoa_fisica_rg_uf' => 'DadosUnicoPessoa Fisica Rg Uf',
            'pessoa_fisica_rg_dt' => 'DadosUnicoPessoa Fisica Rg Dt',
            'pessoa_fisica_passaporte' => 'DadosUnicoPessoa Fisica Passaporte',
            'pessoa_fisica_nm_pai' => 'DadosUnicoPessoa Fisica Nm Pai',
            'pessoa_fisica_nm_mae' => 'DadosUnicoPessoa Fisica Nm Mae',
            'pessoa_fisica_grupo_sanguineo' => 'DadosUnicoPessoa Fisica Grupo Sanguineo',
            'pessoa_fisica_nacionalidade' => 'DadosUnicoPessoa Fisica Nacionalidade',
            'pessoa_fisica_naturalidade' => 'DadosUnicoPessoa Fisica Naturalidade',
            'pessoa_fisica_naturalidade_uf' => 'DadosUnicoPessoa Fisica Naturalidade Uf',
            'pessoa_fisica_clt' => 'DadosUnicoPessoa Fisica Clt',
            'pessoa_fisica_clt_serie' => 'DadosUnicoPessoa Fisica Clt Serie',
            'pessoa_fisica_clt_uf' => 'DadosUnicoPessoa Fisica Clt Uf',
            'pessoa_fisica_titulo' => 'DadosUnicoPessoa Fisica Titulo',
            'pessoa_fisica_titulo_zona' => 'DadosUnicoPessoa Fisica Titulo Zona',
            'pessoa_fisica_titulo_secao' => 'DadosUnicoPessoa Fisica Titulo Secao',
            'pessoa_fisica_titulo_cidade' => 'DadosUnicoPessoa Fisica Titulo Cidade',
            'pessoa_fisica_titulo_uf' => 'DadosUnicoPessoa Fisica Titulo Uf',
            'pessoa_fisica_cnh' => 'DadosUnicoPessoa Fisica Cnh',
            'pessoa_fisica_cnh_categoria' => 'DadosUnicoPessoa Fisica Cnh Categoria',
            'pessoa_fisica_cnh_validade' => 'DadosUnicoPessoa Fisica Cnh Validade',
            'pessoa_fisica_reservista' => 'DadosUnicoPessoa Fisica Reservista',
            'pessoa_fisica_reservista_ministerio' => 'DadosUnicoPessoa Fisica Reservista Ministerio',
            'pessoa_fisica_reservista_uf' => 'DadosUnicoPessoa Fisica Reservista Uf',
            'pessoa_fisica_pis' => 'DadosUnicoPessoa Fisica Pis',
            'estado_civil_id' => 'Estado Civil ID',
            'nivel_escolar_id' => 'Nivel Escolar ID',
            'pessoa_fisica_funcionario' => 'DadosUnicoPessoa Fisica Funcionario',
            'pessoa_fisica_filho' => 'DadosUnicoPessoa Fisica Filho',
            'pessoa_fisica_filha' => 'DadosUnicoPessoa Fisica Filha',
            'pessoa_fisica_cnh_lente_corretiva' => 'DadosUnicoPessoa Fisica Cnh Lente Corretiva',
        ];
    }


    public function getSexoById($id)
    {
        return self::findAll([
            'pessoa_id' => $id
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoFuncionarios()
    {
        return $this->hasMany(DadosUnicoFuncionario::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoNivelTecnicos()
    {
        return $this->hasMany(DadosUnicoNivelTecnico::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoCivil()
    {
        return $this->hasOne(DadosUnicoEstadoCivil::className(), ['estado_civil_id' => 'estado_civil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivelEscolar()
    {
        return $this->hasOne(DadosUnicoNivelEscolar::className(), ['nivel_escolar_id' => 'nivel_escolar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(DadosUnicoPessoa::className(), ['pessoa_id' => 'pessoa_id']);
    }
}
