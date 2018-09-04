<?php

namespace app\models;

/**
 * This is the model class for table "dados_unico.funcionario".
 *
 * @property integer $funcionario_id
 * @property integer $pessoa_id
 * @property integer $funcionario_tipo_id
 * @property integer $funcao_id
 * @property integer $cargo_permanente
 * @property string $funcionario_matricula
 * @property string $funcionario_ramal
 * @property string $funcionario_email
 * @property string $funcionario_dt_admissao
 * @property string $funcionario_dt_demissao
 * @property integer $funcionario_orgao_origem
 * @property string $funcionario_conta_fgts
 * @property integer $contrato_id
 * @property string $funcionario_salario
 * @property integer $cargo_temporario
 * @property integer $funcionario_orgao_destino
 * @property integer $est_organizacional_lotacao_id
 * @property string $funcionario_validacao_propria
 * @property string $funcionario_validacao_rh
 * @property string $funcionario_envio_email
 * @property integer $funcionario_tipo_id_old
 * @property integer $motorista
 * @property string $funcionario_onus
 *
 * @property DadosUnicoEstOrganizacionalFuncionario[] $dadosUnicoEstOrganizacionalFuncionarios
 * @property DadosUnicoCargo $cargoPermanente
 * @property DadosUnicoCargo $cargoTemporario
 * @property DadosUnicoContrato $contrato
 * @property DadosUnicoEstOrganizacionalLotacao $estOrganizacionalLotacao
 * @property DadosUnicoFuncao $funcao
 * @property DadosUnicoFuncionarioTipo $funcionarioTipo
 * @property DadosUnicoOrgao $funcionarioOrgaoOrigem
 * @property DadosUnicoOrgao $funcionarioOrgaoDestino
 * @property DadosUnicoPessoaFisica $pessoa
 * @property DadosUnicoFuncionarioLotacao[] $dadosUnicoFuncionarioLotacaos
 * @property DadosUnicoLotacao[] $lotacaos
 * @property DadosUnicoLogFuncionario[] $dadosUnicoLogFuncionarios
 * @property DiariaDiariaCancelamento[] $diariaDiariaCancelamentos
 */
class DadosUnicoFuncionario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_unico.funcionario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'funcionario_tipo_id'], 'required'],
            [['pessoa_id', 'funcionario_tipo_id', 'funcao_id', 'cargo_permanente', 'funcionario_orgao_origem', 'contrato_id', 'cargo_temporario', 'funcionario_orgao_destino', 'est_organizacional_lotacao_id', 'funcionario_tipo_id_old', 'motorista'], 'integer'],
            [['funcionario_validacao_propria', 'funcionario_validacao_rh', 'funcionario_envio_email'], 'number'],
            [['funcionario_matricula', 'funcionario_conta_fgts', 'funcionario_salario'], 'string', 'max' => 20],
            [['funcionario_ramal'], 'string', 'max' => 5],
            [['funcionario_email'], 'string', 'max' => 200],
            [['funcionario_dt_admissao', 'funcionario_dt_demissao'], 'string', 'max' => 10],
            [['funcionario_onus'], 'string', 'max' => 1],
            [['funcionario_matricula'], 'unique'],
            [['cargo_permanente'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoCargo::className(), 'targetAttribute' => ['cargo_permanente' => 'cargo_id']],
            [['cargo_temporario'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoCargo::className(), 'targetAttribute' => ['cargo_temporario' => 'cargo_id']],
            [['contrato_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoContrato::className(), 'targetAttribute' => ['contrato_id' => 'contrato_id']],
            [['est_organizacional_lotacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoEstOrganizacionalLotacao::className(), 'targetAttribute' => ['est_organizacional_lotacao_id' => 'est_organizacional_lotacao_id']],
            [['funcao_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoFuncao::className(), 'targetAttribute' => ['funcao_id' => 'funcao_id']],
            [['funcionario_tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoFuncionarioTipo::className(), 'targetAttribute' => ['funcionario_tipo_id' => 'funcionario_tipo_id']],
            [['funcionario_orgao_origem'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoOrgao::className(), 'targetAttribute' => ['funcionario_orgao_origem' => 'orgao_id']],
            [['funcionario_orgao_destino'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoOrgao::className(), 'targetAttribute' => ['funcionario_orgao_destino' => 'orgao_id']],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoaFisica::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'funcionario_id' => 'Funcionario ID',
            'pessoa_id' => 'Pessoa ID',
            'funcionario_tipo_id' => 'Tipo de Funcionário',
            'funcao_id' => 'Funcao ID',
            'cargo_permanente' => 'Cargo Permanente',
            'funcionario_matricula' => 'Matrícula',
            'funcionario_ramal' => 'Funcionario Ramal',
            'funcionario_email' => ' E-mail Institucional',
            'funcionario_dt_admissao' => 'Data de Admissão',
            'funcionario_dt_demissao' => 'Data de Demissão',
            'funcionario_orgao_origem' => 'Órgão de Origem',
            'funcionario_conta_fgts' => ' Conta FGTS',
            'contrato_id' => 'Contrato ID',
            'funcionario_salario' => 'Funcionario Salario',
            'cargo_temporario' => 'Cargo Temporario',
            'funcionario_orgao_destino' => 'Órgão a Disposição',
            'est_organizacional_lotacao_id' => 'Local de Trabalho',
            'funcionario_validacao_propria' => 'Funcionario Validacao Propria',
            'funcionario_validacao_rh' => 'Funcionario Validacao Rh',
            'funcionario_envio_email' => 'Funcionario Envio Email',
            'funcionario_tipo_id_old' => 'Funcionario Tipo Id Old',
            'motorista' => 'Motorista',
            'funcionario_onus' => 'Funcionario Onus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoEstOrganizacionalFuncionarios()
    {
        return $this->hasMany(DadosUnicoEstOrganizacionalFuncionario::className(), ['funcionario_id' => 'funcionario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargoPermanente()
    {
        return $this->hasOne(DadosUnicoCargo::className(), ['cargo_id' => 'cargo_permanente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargoTemporario()
    {
        return $this->hasOne(DadosUnicoCargo::className(), ['cargo_id' => 'cargo_temporario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasOne(DadosUnicoContrato::className(), ['contrato_id' => 'contrato_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstOrganizacionalLotacao()
    {
        return $this->hasOne(DadosUnicoEstOrganizacionalLotacao::className(), ['est_organizacional_lotacao_id' => 'est_organizacional_lotacao_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncao()
    {
        return $this->hasOne(DadosUnicoFuncao::className(), ['funcao_id' => 'funcao_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioTipo()
    {
        return $this->hasOne(DadosUnicoFuncionarioTipo::className(), ['funcionario_tipo_id' => 'funcionario_tipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioOrgaoOrigem()
    {
        return $this->hasOne(DadosUnicoOrgao::className(), ['orgao_id' => 'funcionario_orgao_origem']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioOrgaoDestino()
    {
        return $this->hasOne(DadosUnicoOrgao::className(), ['orgao_id' => 'funcionario_orgao_destino']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(DadosUnicoPessoaFisica::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoFuncionarioLotacaos()
    {
        return $this->hasMany(DadosUnicoFuncionarioLotacao::className(), ['funcionario_id' => 'funcionario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLotacaos()
    {
        return $this->hasMany(DadosUnicoLotacao::className(), ['lotacao_id' => 'lotacao_id'])->viaTable('funcionario_lotacao', ['funcionario_id' => 'funcionario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDadosUnicoLogFuncionarios()
    {
        return $this->hasMany(DadosUnicoLogFuncionario::className(), ['funcionario_id' => 'funcionario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiariaDiariaCancelamentos()
    {
        return $this->hasMany(DiariaDiariaCancelamento::className(), ['diaria_cancelamento_func' => 'funcionario_id']);
    }
}
