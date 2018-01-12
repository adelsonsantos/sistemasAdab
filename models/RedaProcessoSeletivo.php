<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbo.PROCESSO_SELETIVO".
 *
 * @property int $IDE_PROCESSO_SELETIVO
 * @property string $DES_PROCESSO_SELETIVO
 * @property int $IDE_UNIDADE
 * @property string $NUM_PORTARIA
 * @property string $NUM_EDITAL
 * @property string $DTC_DIARIO_OFICIAL
 * @property string $DTC_INICIO_PROCESSO
 * @property string $DTC_FIM_PROCESSO
 * @property string $HOR_INICIO_PROCESSO
 * @property string $HOR_FIM_PROCESSO
 * @property int $STS_PROCESSO_FINALIZADO
 * @property int $STS_LIBERADO
 * @property int $IDE_USU_RESPONS
 * @property string $DTC_MODIFICACAO
 * @property string $MSG_TERMO_RESPONSABILIDADE
 */
class RedaProcessoSeletivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbo.PROCESSO_SELETIVO';
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
            [['DES_PROCESSO_SELETIVO', 'NUM_PORTARIA', 'NUM_EDITAL', 'MSG_TERMO_RESPONSABILIDADE'], 'string'],
            [['IDE_UNIDADE', 'STS_PROCESSO_FINALIZADO', 'STS_LIBERADO', 'IDE_USU_RESPONS'], 'integer'],
            [['DTC_DIARIO_OFICIAL', 'DTC_INICIO_PROCESSO', 'DTC_FIM_PROCESSO', 'HOR_INICIO_PROCESSO', 'HOR_FIM_PROCESSO', 'DTC_MODIFICACAO'], 'safe'],
            [['IDE_UNIDADE'], 'exist', 'skipOnError' => true, 'targetClass' => RedaUnidade::className(), 'targetAttribute' => ['IDE_UNIDADE' => 'IDE_UNIDADE']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDE_PROCESSO_SELETIVO' => 'Ide  Processo  Seletivo',
            'DES_PROCESSO_SELETIVO' => 'Des  Processo  Seletivo',
            'IDE_UNIDADE' => 'Ide  Unidade',
            'NUM_PORTARIA' => 'Num  Portaria',
            'NUM_EDITAL' => 'Num  Edital',
            'DTC_DIARIO_OFICIAL' => 'Dtc  Diario  Oficial',
            'DTC_INICIO_PROCESSO' => 'Dtc  Inicio  Processo',
            'DTC_FIM_PROCESSO' => 'Dtc  Fim  Processo',
            'HOR_INICIO_PROCESSO' => 'Hor  Inicio  Processo',
            'HOR_FIM_PROCESSO' => 'Hor  Fim  Processo',
            'STS_PROCESSO_FINALIZADO' => 'Sts  Processo  Finalizado',
            'STS_LIBERADO' => 'Sts  Liberado',
            'IDE_USU_RESPONS' => 'Ide  Usu  Respons',
            'DTC_MODIFICACAO' => 'Dtc  Modificacao',
            'MSG_TERMO_RESPONSABILIDADE' => 'Msg  Termo  Responsabilidade',
        ];
    }
}
