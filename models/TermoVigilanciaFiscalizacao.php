<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "termo.vigilancia_fiscalizacao".
 *
 * @property int $vigilancia_fiscalizacao_id
 * @property int $coordenadas_id
 * @property int $gerencia_id
 * @property int $municipio_id
 * @property int $data_create
 * @property int $vigilancia_fiscalizacao_veiculo_id
 * @property int $vigilancia_fiscalizacao_status_id
 * @property int $vigilancia_fiscalizacao_vacina_id
 * @property string $vigilancia_fiscalizacao_observacao
 * @property int $vigilancia_fiscalizacao_produtor_id
 * @property int $vigilancia_fiscalizacao_proprietario_id
 * @property int $vigilancia_fiscalizacao_local_id
 */
class TermoVigilanciaFiscalizacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'termo.vigilancia_fiscalizacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coordenadas_id', 'gerencia_id', 'municipio_id', 'data_create', 'vigilancia_fiscalizacao_veiculo_id', 'vigilancia_fiscalizacao_status_id', 'vigilancia_fiscalizacao_vacina_id', 'vigilancia_fiscalizacao_produtor_id', 'vigilancia_fiscalizacao_proprietario_id', 'vigilancia_fiscalizacao_local_id'], 'default', 'value' => null],
            [['coordenadas_id', 'gerencia_id', 'municipio_id', 'data_create', 'vigilancia_fiscalizacao_veiculo_id', 'vigilancia_fiscalizacao_status_id', 'vigilancia_fiscalizacao_vacina_id', 'vigilancia_fiscalizacao_produtor_id', 'vigilancia_fiscalizacao_proprietario_id', 'vigilancia_fiscalizacao_local_id'], 'integer'],
            [['vigilancia_fiscalizacao_observacao'], 'string', 'max' => 260],
            [['vigilancia_fiscalizacao_local_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoLocal::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_local_id' => 'vigilancia_fiscalizacao_local_id']],
            [['vigilancia_fiscalizacao_produtor_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoProdutor::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_produtor_id' => 'vigilancia_fiscalizacao_produtor_id']],
            [['vigilancia_fiscalizacao_proprietario_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoProprietario::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_proprietario_id' => 'vigilancia_fiscalizacao_proprietario_id']],
            [['vigilancia_fiscalizacao_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoStatus::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_status_id' => 'vigilancia_fiscalizacao_status_id']],
            [['vigilancia_fiscalizacao_vacina_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoVacina::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_vacina_id' => 'vigilancia_fiscalizacao_vacina_id']],
            [['vigilancia_fiscalizacao_veiculo_id'], 'exist', 'skipOnError' => true, 'targetClass' => TermoVigilanciaFiscalizacaoVeiculo::className(), 'targetAttribute' => ['vigilancia_fiscalizacao_veiculo_id' => 'vigilancia_fiscalizacao_veiculo_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vigilancia_fiscalizacao_id' => 'Vigilancia Fiscalizacao ID',
            'coordenadas_id' => 'Coordenadas',
            'gerencia_id' => 'Gerencia',
            'municipio_id' => 'Municipio',
            'data_create' => 'Data',
            'vigilancia_fiscalizacao_veiculo_id' => 'Veiculo',
            'vigilancia_fiscalizacao_status_id' => 'Status',
            'vigilancia_fiscalizacao_vacina_id' => 'Vacina',
            'vigilancia_fiscalizacao_observacao' => 'Observacao',
            'vigilancia_fiscalizacao_produtor_id' => 'Produtor',
            'vigilancia_fiscalizacao_proprietario_id' => 'Proprietario',
            'vigilancia_fiscalizacao_local_id' => 'Local',
        ];
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermoVigilanciaFiscalizacaoQuery(get_called_class());
    }
}
