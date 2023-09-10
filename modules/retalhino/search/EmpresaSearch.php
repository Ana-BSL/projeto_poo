<?php

namespace app\modules\retalhino\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\retalhino\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form of `app\modules\retalhino\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_entregador', 'id_cliente', 'id_empresa'], 'integer'],
            [['nome', 'cnpj', 'email', 'senha', 'raio_abragencia'], 'safe'],
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
        $query = Empresa::find();

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
            'id_cliente' => $this->id_cliente,
            'id_empresa' => $this->id_empresa,
        ]);

        $query->andFilterWhere(['ilike', 'nome', $this->nome])
            ->andFilterWhere(['ilike', 'cnpj', $this->cnpj])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'senha', $this->senha])
            ->andFilterWhere(['ilike', 'raio_abragencia', $this->raio_abragencia]);

        return $dataProvider;
    }
}
