<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diaria.coordenadoria".
 *
 * @property integer $id_coordenadoria
 * @property string $nome
 *
 * @property PortalComputador[] $portalComputadors
 * @property PortalContatoCoordenadoria[] $portalContatoCoordenadorias
 * @property PortalCoordenadoriaGerencia[] $portalCoordenadoriaGerencias
 */
class DiariaCoordenadoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diaria.coordenadoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_coordenadoria' => 'Id Coordenadoria',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalComputadors()
    {
        return $this->hasMany(PortalComputador::className(), ['id_coordenadoria' => 'id_coordenadoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalContatoCoordenadorias()
    {
        return $this->hasMany(PortalContatoCoordenadoria::className(), ['id_coordenadoria' => 'id_coordenadoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalCoordenadoriaGerencias()
    {
        return $this->hasMany(PortalCoordenadoriaGerencia::className(), ['id_coordenadoria' => 'id_coordenadoria']);
    }
}
