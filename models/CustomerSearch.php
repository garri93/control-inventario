<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'phone', 'activo'], 'integer'],
            [['internal_code', 'name', 'cif', 'notes'], 'safe'],
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
        $query = Customer::find()->activo();

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

        $query->andFilterWhere(['in', 'id', Customer::customerview()]);

        // grid filtering conditions
        $query->andFilterWhere([

            
            'company_id' => $this->company_id,
            'phone' => $this->phone, 
            'activo' => Customer::ACTIVO_SI,
        ]);

        $query->andFilterWhere(['like', 'internal_code', $this->internal_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'cif', $this->cif])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'activo', $this->activo]);
            

        return $dataProvider;
    }
}
