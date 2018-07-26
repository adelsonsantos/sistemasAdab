<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoEquipeFiscal]].
 *
 * @see TermoVigilanciaFiscalizacaoEquipeFiscal
 */
class TermoVigilanciaFiscalizacaoEquipeFiscalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoEquipeFiscal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoEquipeFiscal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
