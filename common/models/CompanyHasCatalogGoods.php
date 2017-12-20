<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_has_catalog_goods".
 *
 * @property integer $company_id
 * @property integer $catalog_goods_id
 *
 * @property CatalogGoods $catalogGoods
 * @property Company $company
 */
class CompanyHasCatalogGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_has_catalog_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'catalog_goods_id'], 'required'],
            [['company_id', 'catalog_goods_id'], 'integer'],
            [['catalog_goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogGoods::className(), 'targetAttribute' => ['catalog_goods_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'catalog_goods_id' => 'Catalog Goods ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogGoods()
    {
        return $this->hasOne(CatalogGoods::className(), ['id' => 'catalog_goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
