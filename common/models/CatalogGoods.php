<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog_goods".
 *
 * @property integer $id
 * @property string $name
 * @property integer $catalog_subcategories_id
 *
 * @property CatalogSubcategories $catalogSubcategories
 * @property CompanyHasCatalogGoods[] $companyHasCatalogGoods
 * @property Company[] $companies
 */
class CatalogGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_subcategories_id'], 'required'],
            [['catalog_subcategories_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['catalog_subcategories_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogSubcategories::className(), 'targetAttribute' => ['catalog_subcategories_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'catalog_subcategories_id' => 'Catalog Subcategories ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogSubcategories()
    {
        return $this->hasOne(CatalogSubcategories::className(), ['id' => 'catalog_subcategories_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyHasCatalogGoods()
    {
        return $this->hasMany(CompanyHasCatalogGoods::className(), ['catalog_goods_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['id' => 'company_id'])->viaTable('company_has_catalog_goods', ['catalog_goods_id' => 'id']);
    }
}
