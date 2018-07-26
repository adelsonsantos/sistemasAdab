<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoVeiculo]].
 *
 * @see TermoVigilanciaFiscalizacaoVeiculo
 */
class TermoVigilanciaFiscalizacaoVeiculoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoVeiculo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoVeiculo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
