<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoAcao]].
 *
 * @see TermoVigilanciaFiscalizacaoAcao
 */
class TermoVigilanciaFiscalizacaoAcaoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAcao[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAcao|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
