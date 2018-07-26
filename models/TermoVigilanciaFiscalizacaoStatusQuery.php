<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoStatus]].
 *
 * @see TermoVigilanciaFiscalizacaoStatus
 */
class TermoVigilanciaFiscalizacaoStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
