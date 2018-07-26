<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimal;

/**
 * TermoVigilanciaFiscalizacaoPopulacaoAnimalSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimal`.
 */
class TermoVigilanciaFiscalizacaoPopulacaoAnimalSearch extends TermoVigilanciaFiscalizacaoPopulacaoAnimal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_populacao_animal_id', 'vigilancia_fiscalizacao_id', 'vigilancia_fiscalizacao_faixa_etaria_id', 'vigilancia_fiscalizacao_populacao_animal_machos_nascidos', 'vigilancia_fiscalizacao_populacao_animal_machos_mortos', 'vigilancia_fiscalizacao_populacao_animal_machos_existentes', 'vigilancia_fiscalizacao_populacao_animal_machos_vacinados', 'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas', 'vigilancia_fiscalizacao_animal_campos_femeas_mortos', 'vigilancia_fiscalizacao_populacao_animal_femeas_existentes', 'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas', 'vigilancia_fiscalizacao_populacao_animal_quantidade', 'vigilancia_fiscalizacao_populacao_animal_st', 'vigilancia_fiscalizacao_animal_id'], 'integer'],
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
        $query = TermoVigilanciaFiscalizacaoPopulacaoAnimal::find();

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
            'vigilancia_fiscalizacao_populacao_animal_id' => $this->vigilancia_fiscalizacao_populacao_animal_id,
            'vigilancia_fiscalizacao_id' => $this->vigilancia_fiscalizacao_id,
            'vigilancia_fiscalizacao_faixa_etaria_id' => $this->vigilancia_fiscalizacao_faixa_etaria_id,
            'vigilancia_fiscalizacao_populacao_animal_machos_nascidos' => $this->vigilancia_fiscalizacao_populacao_animal_machos_nascidos,
            'vigilancia_fiscalizacao_populacao_animal_machos_mortos' => $this->vigilancia_fiscalizacao_populacao_animal_machos_mortos,
            'vigilancia_fiscalizacao_populacao_animal_machos_existentes' => $this->vigilancia_fiscalizacao_populacao_animal_machos_existentes,
            'vigilancia_fiscalizacao_populacao_animal_machos_vacinados' => $this->vigilancia_fiscalizacao_populacao_animal_machos_vacinados,
            'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas' => $this->vigilancia_fiscalizacao_populacao_animal_femeas_nascidas,
            'vigilancia_fiscalizacao_animal_campos_femeas_mortos' => $this->vigilancia_fiscalizacao_animal_campos_femeas_mortos,
            'vigilancia_fiscalizacao_populacao_animal_femeas_existentes' => $this->vigilancia_fiscalizacao_populacao_animal_femeas_existentes,
            'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas' => $this->vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas,
            'vigilancia_fiscalizacao_populacao_animal_quantidade' => $this->vigilancia_fiscalizacao_populacao_animal_quantidade,
            'vigilancia_fiscalizacao_populacao_animal_st' => $this->vigilancia_fiscalizacao_populacao_animal_st,
            'vigilancia_fiscalizacao_animal_id' => $this->vigilancia_fiscalizacao_animal_id,
        ]);

        return $dataProvider;
    }
}
