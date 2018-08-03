<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DadosUnicoPessoaJuridica]].
 *
 * @see DadosUnicoPessoaJuridica
 */
class DadosUnicoPessoaJuridicaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DadosUnicoPessoaJuridica[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DadosUnicoPessoaJuridica|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
