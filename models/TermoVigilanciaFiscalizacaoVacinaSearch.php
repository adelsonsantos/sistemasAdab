<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TermoVigilanciaFiscalizacaoVacina;

/**
 * TermoVigilanciaFiscalizacaoVacinaSearch represents the model behind the search form of `app\models\TermoVigilanciaFiscalizacaoVacina`.
 */
class TermoVigilanciaFiscalizacaoVacinaSearch extends TermoVigilanciaFiscalizacaoVacina
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vigilancia_fiscalizacao_vacina_id', 'vigilancia_fiscalizacao_febre_aftosa_revenda', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda', 'vigilancia_fiscalizacao_brucelose_revenda', 'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id', 'vigilancia_fiscalizacao_brucelose_laboratorio_id', 'vigilancia_fiscalizacao_outros_laboratorio_id'], 'integer'],
            [['vigilancia_fiscalizacao_outros_revenda', 'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal', 'vigilancia_fiscalizacao_brucelose_nota_fiscal', 'vigilancia_fiscalizacao_febre_aftosa_partida', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida', 'vigilancia_fiscalizacao_brucelose_partida', 'vigilancia_fiscalizacao_outros_partida', 'vigilancia_fiscalizacao_febre_aftosa_validade', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade', 'vigilancia_fiscalizacao_brucelose_validade', 'vigilancia_fiscalizacao_outros_validade', 'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao', 'vigilancia_fiscalizacao_brucelose_data_vacinacao', 'vigilancia_fiscalizacao_outros_data_vacinacao'], 'safe'],
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
        $query = TermoVigilanciaFiscalizacaoVacina::find();

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
            'vigilancia_fiscalizacao_vacina_id' => $this->vigilancia_fiscalizacao_vacina_id,
            'vigilancia_fiscalizacao_febre_aftosa_revenda' => $this->vigilancia_fiscalizacao_febre_aftosa_revenda,
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda' => $this->vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda,
            'vigilancia_fiscalizacao_brucelose_revenda' => $this->vigilancia_fiscalizacao_brucelose_revenda,
            'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id' => $this->vigilancia_fiscalizacao_febre_aftosa_laboratorio_id,
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id' => $this->vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id,
            'vigilancia_fiscalizacao_brucelose_laboratorio_id' => $this->vigilancia_fiscalizacao_brucelose_laboratorio_id,
            'vigilancia_fiscalizacao_outros_laboratorio_id' => $this->vigilancia_fiscalizacao_outros_laboratorio_id,
            'vigilancia_fiscalizacao_febre_aftosa_validade' => $this->vigilancia_fiscalizacao_febre_aftosa_validade,
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade' => $this->vigilancia_fiscalizacao_raiva_dos_herbivoros_validade,
            'vigilancia_fiscalizacao_brucelose_validade' => $this->vigilancia_fiscalizacao_brucelose_validade,
            'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao' => $this->vigilancia_fiscalizacao_febre_aftosa_data_vacinacao,
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao' => $this->vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao,
            'vigilancia_fiscalizacao_brucelose_data_vacinacao' => $this->vigilancia_fiscalizacao_brucelose_data_vacinacao,
        ]);

        $query->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_outros_revenda', $this->vigilancia_fiscalizacao_outros_revenda])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal', $this->vigilancia_fiscalizacao_febre_aftosa_nota_fiscal])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal', $this->vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_brucelose_nota_fiscal', $this->vigilancia_fiscalizacao_brucelose_nota_fiscal])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_febre_aftosa_partida', $this->vigilancia_fiscalizacao_febre_aftosa_partida])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida', $this->vigilancia_fiscalizacao_raiva_dos_herbivoros_partida])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_brucelose_partida', $this->vigilancia_fiscalizacao_brucelose_partida])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_outros_partida', $this->vigilancia_fiscalizacao_outros_partida])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_outros_validade', $this->vigilancia_fiscalizacao_outros_validade])
            ->andFilterWhere(['ilike', 'vigilancia_fiscalizacao_outros_data_vacinacao', $this->vigilancia_fiscalizacao_outros_data_vacinacao]);

        return $dataProvider;
    }
}
