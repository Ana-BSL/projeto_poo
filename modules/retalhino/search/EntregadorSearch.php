<?php

namespace app\modules\retalhino\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\retalhino\models\Entregador;

/**
 * EntregadorSearch represents the model behind the search form of `app\modules\retalhino\models\Entregador`.
 */
class EntregadorSearch extends Entregador
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_entregador'], 'integer'],
            [['nome', 'cpf', 'email', 'senha', 'sexo', 'peso_maximo', 'veiculo', 'placa', 'raio_abragencia'], 'safe'],
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
        $query = Entregador::find();

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
            'id_entregador' => $this->id_entregador,
        ]);

        $query->andFilterWhere(['ilike', 'nome', $this->nome])
            ->andFilterWhere(['ilike', 'cpf', $this->cpf])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'senha', $this->senha])
            ->andFilterWhere(['ilike', 'sexo', $this->sexo])
            ->andFilterWhere(['ilike', 'peso_maximo', $this->peso_maximo])
            ->andFilterWhere(['ilike', 'veiculo', $this->veiculo])
            ->andFilterWhere(['ilike', 'placa', $this->placa])
            ->andFilterWhere(['ilike', 'raio_abragencia', $this->raio_abragencia]);

        return $dataProvider;
    }
}
