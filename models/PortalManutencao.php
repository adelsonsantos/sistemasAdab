<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.manutencao".
 *
 * @property int $manutencao_id
 * @property int $tombo_id
 * @property string $manutencao_data_recebimento
 * @property int $manutencao_pessoa_recebimento_inf
 * @property int $manutencao_beneficiario
 * @property string $manutencao_data_devolucao
 * @property int $manutencao_func_devolucao_inf
 * @property int $manutencao_beneficiario_devolucao
 * @property string $manutencao_descricao
 * @property string $manutencao_resolucao
 * @property int $manutencao_status
 */
class PortalManutencao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.manutencao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tombo_id', 'manutencao_data_recebimento', 'manutencao_pessoa_recebimento_inf', 'manutencao_beneficiario', 'manutencao_descricao', 'manutencao_status'], 'required'],
            [['tombo_id', 'manutencao_pessoa_recebimento_inf', 'manutencao_beneficiario', 'manutencao_func_devolucao_inf', 'manutencao_beneficiario_devolucao', 'manutencao_status'], 'default', 'value' => null],
            [['tombo_id', 'manutencao_pessoa_recebimento_inf', 'manutencao_beneficiario', 'manutencao_func_devolucao_inf', 'manutencao_beneficiario_devolucao', 'manutencao_status'], 'integer'],
            [['manutencao_data_recebimento', 'manutencao_data_devolucao'], 'safe'],
            [['manutencao_descricao', 'manutencao_resolucao'], 'string', 'max' => 255],
            [['manutencao_pessoa_recebimento_inf'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['manutencao_pessoa_recebimento_inf' => 'pessoa_id']],
            [['manutencao_beneficiario'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['manutencao_beneficiario' => 'pessoa_id']],
            [['manutencao_func_devolucao_inf'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['manutencao_func_devolucao_inf' => 'pessoa_id']],
            [['manutencao_beneficiario_devolucao'], 'exist', 'skipOnError' => true, 'targetClass' => DadosUnicoPessoa::className(), 'targetAttribute' => ['manutencao_beneficiario_devolucao' => 'pessoa_id']],
            [['tombo_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortalTombo::className(), 'targetAttribute' => ['tombo_id' => 'tombo_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manutencao_id' => 'Manutencao ID',
            'tombo_id' => 'Tombo ID',
            'manutencao_data_recebimento' => 'Manutencao Data Recebimento',
            'manutencao_pessoa_recebimento_inf' => 'Manutencao Pessoa Recebimento Inf',
            'manutencao_beneficiario' => 'Manutencao Beneficiario',
            'manutencao_data_devolucao' => 'Manutencao Data Devolucao',
            'manutencao_func_devolucao_inf' => 'Manutencao Func Devolucao Inf',
            'manutencao_beneficiario_devolucao' => 'Manutencao Beneficiario Devolucao',
            'manutencao_descricao' => 'Manutencao Descricao',
            'manutencao_resolucao' => 'Manutencao Resolucao',
            'manutencao_status' => 'Manutencao Status',
        ];
    }
}
