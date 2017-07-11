<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalContatoCoordenadoria;

/**
 * PortalContatoCoordenadoriaSearch represents the model behind the search form about `app\models\PortalContatoCoordenadoria`.
 */
class PortalContatoCoordenadoriaSearch extends PortalContatoCoordenadoria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['con_id', 'con_telefone', 'id_coordenadoria'], 'safe']
        ];
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
        $query = PortalContatoCoordenadoria::find();

        // add conditions that should always apply here

        $query->joinWith('con');
        $query->joinWith('idCoordenadoria');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['con_id'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
             'coc_id' => $this->coc_id,
             'diaria.coordenadoria.nome' => $this->id_coordenadoria,
             'portal.contato.con_telefone' => $this->con_id,
        ]);

        return $dataProvider;
    }
}
