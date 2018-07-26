<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoAnimal;

/**
 * TermoVigilanciaFiscalizacaoAnimalSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoAnimal`.
 */
class TermoVigilanciaFiscalizacaoAnimalSearch extends TermoVigilanciaFiscalizacaoAnimal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_animal_id', 'vigilancia_fiscalizacao_animal_st'], 'integer'],
            [['vigilancia_fiscalizacao_animal_nome'], 'safe'],
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
        $query = TermoVigilanciaFiscalizacaoAnimal::find();

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
            'vigilancia_fiscalizacao_animal_id' => $this->vigilancia_fiscalizacao_animal_id,
            'vigilancia_fiscalizacao_animal_st' => $this->vigilancia_fiscalizacao_animal_st,
        ]);

        $query->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_animal_nome', $this->vigilancia_fiscalizacao_animal_nome]);

        return $dataProvider;
    }
}
