<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DadosUnicoContrato]].
 *
 * @see DadosUnicoContrato
 */
class DadosUnicoContratoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DadosUnicoContrato[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DadosUnicoContrato|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
