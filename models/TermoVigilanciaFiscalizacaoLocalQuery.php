<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoLocal]].
 *
 * @see TermoVigilanciaFiscalizacaoLocal
 */
class TermoVigilanciaFiscalizacaoLocalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoLocal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoLocal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
