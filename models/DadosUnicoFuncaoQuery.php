<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DadosUnicoFuncao]].
 *
 * @see DadosUnicoFuncao
 */
class DadosUnicoFuncaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DadosUnicoFuncao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DadosUnicoFuncao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
