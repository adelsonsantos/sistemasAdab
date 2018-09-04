<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DadosUnicoOrgao]].
 *
 * @see DadosUnicoOrgao
 */
class DadosUnicoOrgaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DadosUnicoOrgao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DadosUnicoOrgao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
