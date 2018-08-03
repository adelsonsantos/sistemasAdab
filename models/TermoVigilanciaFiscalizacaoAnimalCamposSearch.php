<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoAnimalCampos;

/**
 * TermoVigilanciaFiscalizacaoAnimalCamposSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoAnimalCampos`.
 */
class TermoVigilanciaFiscalizacaoAnimalCamposSearch extends TermoVigilanciaFiscalizacaoAnimalCampos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_animal_campos_id', 'vigilancia_fiscalizacao_animal_id', 'vigilancia_fiscalizacao_animal_campos_st'], 'integer'],
            [['vigilancia_fiscalizacao_animal_campos_machos_nascidos', 'vigilancia_fiscalizacao_animal_campos_machos_mortos', 'vigilancia_fiscalizacao_animal_campos_machos_existentes', 'vigilancia_fiscalizacao_animal_campos_machos_vacinados', 'vigilancia_fiscalizacao_animal_campos_femeas_nascidas', 'vigilancia_fiscalizacao_animal_campos_femeas_mortas', 'vigilancia_fiscalizacao_animal_campos_femeas_existentes', 'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas', 'vigilancia_fiscalizacao_animal_campos_quantidade'], 'boolean'],
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
        $query = TermoVigilanciaFiscalizacaoAnimalCampos::find();

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
            'vigilancia_fiscalizacao_animal_campos_id' => $this->vigilancia_fiscalizacao_animal_campos_id,
            'vigilancia_fiscalizacao_animal_id' => $this->vigilancia_fiscalizacao_animal_id,
            'vigilancia_fiscalizacao_animal_campos_machos_nascidos' => $this->vigilancia_fiscalizacao_animal_campos_machos_nascidos,
            'vigilancia_fiscalizacao_animal_campos_machos_mortos' => $this->vigilancia_fiscalizacao_animal_campos_machos_mortos,
            'vigilancia_fiscalizacao_animal_campos_machos_existentes' => $this->vigilancia_fiscalizacao_animal_campos_machos_existentes,
            'vigilancia_fiscalizacao_animal_campos_machos_vacinados' => $this->vigilancia_fiscalizacao_animal_campos_machos_vacinados,
            'vigilancia_fiscalizacao_animal_campos_femeas_nascidas' => $this->vigilancia_fiscalizacao_animal_campos_femeas_nascidas,
            'vigilancia_fiscalizacao_animal_campos_femeas_mortas' => $this->vigilancia_fiscalizacao_animal_campos_femeas_mortas,
            'vigilancia_fiscalizacao_animal_campos_femeas_existentes' => $this->vigilancia_fiscalizacao_animal_campos_femeas_existentes,
            'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas' => $this->vigilancia_fiscalizacao_animal_campos_femeas_vacinadas,
            'vigilancia_fiscalizacao_animal_campos_quantidade' => $this->vigilancia_fiscalizacao_animal_campos_quantidade,
            'vigilancia_fiscalizacao_animal_campos_st' => $this->vigilancia_fiscalizacao_animal_campos_st,
        ]);

        return $dataProvider;
    }
}
