<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalCoordenadoriaGerencia;

/**
 * PortalCoordenadoriaGerenciaSearch represents the model behind the search form about `app\models\PortalCoordenadoriaGerencia`.
 */
class PortalCoordenadoriaGerenciaSearch extends PortalCoordenadoriaGerencia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cog_id', 'id_coordenadoria', 'ger_id'], 'safe'],
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
        $query = PortalCoordenadoriaGerencia::find();

        $query->joinWith('ger');
        $query->joinWith('idCoordenadoria');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'diaria.coordenadoria.nome' => $this->id_coordenadoria,
            'portal.gerencia.ger_nome' => $this->ger_id
        ]);

        return $dataProvider;
    }
}
