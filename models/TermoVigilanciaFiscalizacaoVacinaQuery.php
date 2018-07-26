<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoVacina]].
 *
 * @see TermoVigilanciaFiscalizacaoVacina
 */
class TermoVigilanciaFiscalizacaoVacinaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoVacina[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoVacina|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
