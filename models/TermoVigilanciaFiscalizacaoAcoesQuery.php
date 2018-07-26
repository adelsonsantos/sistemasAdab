<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoAcoes]].
 *
 * @see TermoVigilanciaFiscalizacaoAcoes
 */
class TermoVigilanciaFiscalizacaoAcoesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAcoes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAcoes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
