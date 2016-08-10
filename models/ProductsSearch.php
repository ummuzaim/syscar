<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productCode', 'productName', 'productLine', 'productScale', 'productVendor', 'productDescription'], 'safe'],
            [['quantityInStock'], 'integer'],
            [['buyPrice', 'MSRP'], 'number'],
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
        $query = Products::find();

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
            'quantityInStock' => $this->quantityInStock,
            'buyPrice' => $this->buyPrice,
            'MSRP' => $this->MSRP,
        ]);

        $query->andFilterWhere(['like', 'productCode', $this->productCode])
            ->andFilterWhere(['like', 'productName', $this->productName])
            ->andFilterWhere(['like', 'productLine', $this->productLine])
            ->andFilterWhere(['like', 'productScale', $this->productScale])
            ->andFilterWhere(['like', 'productVendor', $this->productVendor])
            ->andFilterWhere(['like', 'productDescription', $this->productDescription]);

        return $dataProvider;
    }
}
