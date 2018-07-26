<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TermoVigilanciaFiscalizacaoAtividade]].
 *
 * @see TermoVigilanciaFiscalizacaoAtividade
 */
class TermoVigilanciaFiscalizacaoAtividadeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAtividade[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TermoVigilanciaFiscalizacaoAtividade|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
