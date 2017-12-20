<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about `common\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'taxpayer_certificate', 'individual_certificate', 'created_at'], 'integer'],
            [['name_company', 'username', 'direction_activity', 'address', 'phone_number', 'email', 'product_name', 'information'], 'safe'],
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
        $query = Payment::find();

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
            'id' => $this->id,
            'taxpayer_certificate' => $this->taxpayer_certificate,
            'individual_certificate' => $this->individual_certificate,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name_company', $this->name_company])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'direction_activity', $this->direction_activity])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'information', $this->information]);

        return $dataProvider;
    }
}
