<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoAnimal]].
 *
 * @see TermoVigilanciaFiscalizacaoAnimal
 */
class TermoVigilanciaFiscalizacaoAnimalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAnimal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAnimal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
