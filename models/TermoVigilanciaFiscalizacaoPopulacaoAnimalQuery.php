<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoPopulacaoAnimal]].
 *
 * @see TermoVigilanciaFiscalizacaoPopulacaoAnimal
 */
class TermoVigilanciaFiscalizacaoPopulacaoAnimalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoPopulacaoAnimal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoPopulacaoAnimal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
