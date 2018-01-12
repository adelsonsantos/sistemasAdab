<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbo.FICHA_INSCRICAO".
 *
 * @property int $IDE_FICHA_INSCRICAO
 * @property int $IDE_PROCESSO_SELETIVO
 * @property string $NOM_CANDIDATO
 * @property string $DTC_NASCIMENTO
 * @property string $NUM_CPF
 * @property string $NUM_RG
 * @property string $NOM_ORGAO_EMISSOR
 * @property string $DES_ESTADO_CIVIL
 * @property int $STS_DEFICIENTE_FISICO
 * @property string $DES_DEFICIENCIA
 * @property int $STS_FILHOS
 * @property int $QTD_FILHOS
 * @property string $DES_ENDERECO
 * @property string $NOM_BAIRRO
 * @property string $NUM_CEP
 * @property string $NOM_CIDADE
 * @property string $NOM_ESTADO
 * @property string $NUM_TELEFONE01
 * @property string $NUM_TELEFONE02
 * @property string $DES_EMAIL
 * @property string $DTC_CADASTRO
 * @property int $STS_APROVADO
 * @property string $NUM_CNH
 * @property string $TIP_CATEGORIA
 * @property string $DTC_VALIDADE_CNH
 * @property int $COD_CARGO_CURSO_PROCESSO
 * @property string $DES_CARGO_CURSO_PROCESSO
 * @property string $DES_RACA
 */
class RedaFichaInscricao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbo.FICHA_INSCRICAO';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDE_PROCESSO_SELETIVO', 'STS_DEFICIENTE_FISICO', 'STS_FILHOS', 'QTD_FILHOS', 'STS_APROVADO', 'COD_CARGO_CURSO_PROCESSO'], 'integer'],
            [['NOM_CANDIDATO', 'NUM_CPF', 'NUM_RG', 'NOM_ORGAO_EMISSOR', 'DES_ESTADO_CIVIL', 'DES_DEFICIENCIA', 'DES_ENDERECO', 'NOM_BAIRRO', 'NUM_CEP', 'NOM_CIDADE', 'NOM_ESTADO', 'NUM_TELEFONE01', 'NUM_TELEFONE02', 'DES_EMAIL', 'NUM_CNH', 'TIP_CATEGORIA', 'DES_CARGO_CURSO_PROCESSO', 'DES_RACA'], 'string'],
            [['DTC_NASCIMENTO', 'DTC_CADASTRO', 'DTC_VALIDADE_CNH'], 'safe'],
            [['IDE_PROCESSO_SELETIVO'], 'exist', 'skipOnError' => true, 'targetClass' => RedaProcessoSeletivo::className(), 'targetAttribute' => ['IDE_PROCESSO_SELETIVO' => 'IDE_PROCESSO_SELETIVO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDE_FICHA_INSCRICAO' => 'Ide  Ficha  Inscricao',
            'IDE_PROCESSO_SELETIVO' => 'Ide  Processo  Seletivo',
            'NOM_CANDIDATO' => 'Nome Completo',
            'DTC_NASCIMENTO' => 'Data de nascimento:',
            'NUM_CPF' => 'CPF:',
            'NUM_RG' => 'RG:',
            'NOM_ORGAO_EMISSOR' => 'Orgão Emissor:',
            'DES_ESTADO_CIVIL' => 'Des  Estado  Civil',
            'STS_DEFICIENTE_FISICO' => 'Sts  Deficiente  Fisico',
            'DES_DEFICIENCIA' => 'Des  Deficiencia',
            'STS_FILHOS' => 'Sts  Filhos',
            'QTD_FILHOS' => 'Qtd  Filhos',
            'DES_ENDERECO' => 'Des  Endereco',
            'NOM_BAIRRO' => 'Nom  Bairro',
            'NUM_CEP' => 'Num  Cep',
            'NOM_CIDADE' => 'Nom  Cidade',
            'NOM_ESTADO' => 'Nom  Estado',
            'NUM_TELEFONE01' => 'Num  Telefone01',
            'NUM_TELEFONE02' => 'Num  Telefone02',
            'DES_EMAIL' => 'Des  Email',
            'DTC_CADASTRO' => 'Dtc  Cadastro',
            'STS_APROVADO' => 'Sts  Aprovado',
            'NUM_CNH' => 'Num  Cnh',
            'TIP_CATEGORIA' => 'Tip  Categoria',
            'DTC_VALIDADE_CNH' => 'Dtc  Validade  Cnh',
            'COD_CARGO_CURSO_PROCESSO' => 'Cod  Cargo  Curso  Processo',
            'DES_CARGO_CURSO_PROCESSO' => 'Des  Cargo  Curso  Processo',
            'DES_RACA' => 'Raça:',
        ];
    }
}
