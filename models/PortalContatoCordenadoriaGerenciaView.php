<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portal.contato_cordenadoria_gerencia_view".
 *
 * @property int $cog_id
 * @property int $id_coordenadoria
 * @property string $nome
 * @property int $ger_id
 * @property string $ger_nome
 * @property int $con_id
 * @property string $con_nome
 * @property string $con_ddd
 * @property string $con_telefone
 * @property int $cti_id
 * @property string $cti_nome
 * @property int $esc_id
 * @property string $esc_nome
 */
class PortalContatoCordenadoriaGerenciaView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portal.contato_cordenadoria_gerencia_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cog_id', 'id_coordenadoria', 'ger_id', 'con_id', 'cti_id', 'esc_id'], 'default', 'value' => null],
            [['cog_id', 'id_coordenadoria', 'ger_id', 'con_id', 'cti_id', 'esc_id'], 'integer'],
            [['nome'], 'string', 'max' => 200],
            [['ger_nome', 'con_nome', 'cti_nome', 'esc_nome'], 'string', 'max' => 60],
            [['con_ddd'], 'string', 'max' => 2],
            [['con_telefone'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cog_id' => 'Cog ID',
            'id_coordenadoria' => 'Id Coordenadoria',
            'nome' => 'Nome',
            'ger_id' => 'ID',
            'ger_nome' => 'Nome',
            'con_id' => 'ID',
            'con_nome' => 'Nome',
            'con_ddd' => 'Ddd',
            'con_telefone' => 'Telefone',
            'cti_id' => 'Cti ID',
            'cti_nome' => 'Cti Nome',
            'esc_id' => 'Esc ID',
            'esc_nome' => 'Esc Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContatoCoordenadoria()
    {
        return $this->hasOne(DiariaCoordenadoria::className(), ['id_coordenadoria' => 'id_coordenadoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContatoGerencia()
    {
        return $this->hasOne(PortalGerencia::className(), ['ger_id' => 'ger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContato()
    {
        return $this->hasOne(PortalContato::className(), ['con_id' => 'con_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContatoTipo()
    {
        return $this->hasOne(PortalContatoTipo::className(), ['cti_id' => 'cti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscritorio()
    {
        return $this->hasOne(PortalEscritorio::className(), ['esc_id' => 'esc_id']);
    }
}
