<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalEscritorio;

/**
 * PortalEscritorioSearch represents the model behind the search form of `app\models\PortalEscritorio`.
 */
class PortalEscritorioSearch extends PortalEscritorio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['esc_id', 'id_coordenadoria', 'ger_id'], 'integer'],
            [['esc_nome'], 'safe'],
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
        $query = PortalEscritorio::find();

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
            'esc_id' => $this->esc_id,
            'id_coordenadoria' => $this->id_coordenadoria,
            'ger_id' => $this->ger_id,
        ]);

        $query->andFilterWhere(['ilike', 'esc_nome', $this->esc_nome]);

        return $dataProvider;
    }
}
