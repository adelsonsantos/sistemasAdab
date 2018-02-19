<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalContatoCordenadoriaGerencia;

/**
 * PortalContatoCordenadoriaGerenciaViewSearch represents the model behind the search form about `app\models\PortalContatoCordenadoriaGerencia`.
 */
class PortalContatoCordenadoriaGerenciaViewSearch extends PortalContatoCordenadoriaGerenciaView
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cog_id', 'id_coordenadoria', 'nome', 'ger_id', 'ger_nome', 'con_id', 'con_nome', 'con_ddd', 'con_telefone', 'cti_id', 'cti_nome', 'esc_id'], 'safe']        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PortalContatoCordenadoriaGerenciaView::find();

        // add conditions that should always apply here

       // $query->joinWith('con');
     //   $query->joinWith('idCoordenadoria');
        $dataProvider = new ActiveDataProvider([
            'query' => $query
          //  'sort'=> ['defaultOrder' => ['con_id'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cog_id' => $this->cog_id,
            'id_coordenadoria' => $this->id_coordenadoria,
            'ger_id' => $this->ger_id,
            'con_id' => $this->con_id,
            'cti_id' => $this->cti_id,
            'cti_nome' => $this->cti_nome,
            'esc_id'   => $this->esc_id

/*
            'diaria.coordenadoria.nome' => $this->id_coordenadoria,
            'portal.contato.con_ddd' => $this->coc_id,
            'portal.contato.con_telefone' => $this->con_id,*/
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'ger_nome', $this->ger_nome])
            ->andFilterWhere(['like', 'con_nome', $this->con_nome])
            ->andFilterWhere(['like', 'con_ddd', $this->con_ddd])
            ->andFilterWhere(['like', 'con_telefone', $this->con_telefone])
            ->andFilterWhere(['like', 'cti_nome', $this->cti_nome]);
        return $dataProvider;
    }
}
