<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalContatoGerencia;

/**
 * PortalContatoGerenciaSearch represents the model behind the search form about `app\models\PortalContatoGerencia`.
 */
class PortalContatoGerenciaSearch extends PortalContatoGerencia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cge_id', 'con_id', 'ger_id'], 'safe'],
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
        $query = PortalContatoGerencia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith('ger');
        $query->joinWith('con');
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'portal.contato.con_telefone' => $this->con_id,
            'portal.contato.con_ddd' => $this->cge_id,
            'portal.gerencia.ger_nome' => $this->ger_id
        ]);

        return $dataProvider;
    }
}
