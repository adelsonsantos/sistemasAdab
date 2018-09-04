<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DadosUnicoNivelTecnico]].
 *
 * @see DadosUnicoNivelTecnico
 */
class DadosUnicoNivelTecnicoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DadosUnicoNivelTecnico[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DadosUnicoNivelTecnico|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
