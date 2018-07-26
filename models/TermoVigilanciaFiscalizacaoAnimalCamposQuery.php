<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoAnimalCampos]].
 *
 * @see TermoVigilanciaFiscalizacaoAnimalCampos
 */
class TermoVigilanciaFiscalizacaoAnimalCamposQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAnimalCampos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAnimalCampos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
