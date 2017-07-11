<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PortalContato;

/**
 * PortalContatoSearch represents the model behind the search form about `app\models\PortalContato`.
 */
class PortalContatoSearch extends PortalContato
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['con_id'], 'integer'],
            [['con_nome', 'con_telefone', 'con_ddd'], 'safe'],
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
        $query = PortalContato::find();

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
            'con_id' => $this->con_id,
        ]);

        $query->andFilterWhere(['like', 'con_nome', $this->con_nome])
            ->andFilterWhere(['like', 'con_telefone', $this->con_telefone])
            ->andFilterWhere(['like', 'con_ddd', $this->con_ddd]);

        return $dataProvider;
    }
}
