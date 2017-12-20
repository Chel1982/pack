<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyHasCatalogSubcategories;

/**
 * CompanyhascatalogsubcategoriesSearch represents the model behind the search form about `common\models\CompanyHasCatalogSubcategories`.
 */
class CompanyhascatalogsubcategoriesSearch extends CompanyHasCatalogSubcategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'catalog_subcategories_id'], 'integer'],
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
        $query = CompanyHasCatalogSubcategories::find();

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
            'company_id' => $this->company_id,
            'catalog_subcategories_id' => $this->catalog_subcategories_id,
        ]);

        return $dataProvider;
    }
}
