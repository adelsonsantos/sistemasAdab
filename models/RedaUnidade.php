<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbo.unidade".
 *
 * @property int $IDE_UNIDADE
 * @property string $COD_UNIDADE_BDCE
 * @property string $NOM_UNIDADE
 * @property string $SGL_UNIDADE
 * @property int $IDE_ORGAO_ENTIDADE
 */
class RedaUnidade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbo.unidade';
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
            [['COD_UNIDADE_BDCE', 'NOM_UNIDADE', 'SGL_UNIDADE'], 'string'],
            [['IDE_ORGAO_ENTIDADE'], 'integer'],
            [['IDE_ORGAO_ENTIDADE'], 'exist', 'skipOnError' => true, 'targetClass' => ORGAOENTIDADE::className(), 'targetAttribute' => ['IDE_ORGAO_ENTIDADE' => 'IDE_ORGAO_ENTIDADE']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDE_UNIDADE' => 'Ide  Unidade',
            'COD_UNIDADE_BDCE' => 'Cod  Unidade  Bdce',
            'NOM_UNIDADE' => 'Nom  Unidade',
            'SGL_UNIDADE' => 'Sgl  Unidade',
            'IDE_ORGAO_ENTIDADE' => 'Ide  Orgao  Entidade',
        ];
    }
}
