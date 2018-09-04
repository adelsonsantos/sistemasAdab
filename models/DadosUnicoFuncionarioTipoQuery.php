<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DadosUnicoFuncionarioTipo]].
 *
 * @see DadosUnicoFuncionarioTipo
 */
class DadosUnicoFuncionarioTipoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DadosUnicoFuncionarioTipo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DadosUnicoFuncionarioTipo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
