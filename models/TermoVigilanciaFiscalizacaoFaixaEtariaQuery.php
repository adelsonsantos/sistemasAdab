<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoFaixaEtaria]].
 *
 * @see TermoVigilanciaFiscalizacaoFaixaEtaria
 */
class TermoVigilanciaFiscalizacaoFaixaEtariaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoFaixaEtaria[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoFaixaEtaria|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
