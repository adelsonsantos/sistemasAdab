<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DadosUnicoEstOrganizacionalFuncionario]].
 *
 * @see DadosUnicoEstOrganizacionalFuncionario
 */
class DadosUnicoEstOrganizacionalFuncionarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DadosUnicoEstOrganizacionalFuncionario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DadosUnicoEstOrganizacionalFuncionario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
