<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DadosUnicoSegurancaUsuario;

/**
 * DadosUnicoSegurancaUsuarioSearch represents the model behind the search form of `app\models\DadosUnicoSegurancaUsuario`.
 */
class DadosUnicoSegurancaUsuarioSearch extends DadosUnicoSegurancaUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pessoa_id', 'usuario_diaria', 'id_coordenadoria'], 'integer'],
            [['usuario_login', 'usuario_senha', 'usuario_dt_criacao', 'usuario_dt_alteracao'], 'safe'],
            [['usuario_st', 'usuario_primeiro_logon'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $pessoa = DadosUnicoPessoa::find()->select('pessoa_id')->where(['pessoa_st'=>0])->asArray()->orderBy('pessoa_nm')->all();
        $query = DadosUnicoSegurancaUsuario::find()->where([ 'pessoa_id' => $pessoa])->orderBy('usuario_login');

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
            'pessoa_id' => $this->pessoa_id,
            'usuario_st' => $this->usuario_st,
            'usuario_dt_criacao' => $this->usuario_dt_criacao,
            'usuario_dt_alteracao' => $this->usuario_dt_alteracao,
            'usuario_primeiro_logon' => $this->usuario_primeiro_logon,
            'usuario_diaria' => $this->usuario_diaria,
            'id_coordenadoria' => $this->id_coordenadoria,
        ]);

        $query->andFilterWhere(['ilike', 'usuario_login', $this->usuario_login])
            ->andFilterWhere(['ilike', 'usuario_senha', $this->usuario_senha]);

        return $dataProvider;
    }
}
