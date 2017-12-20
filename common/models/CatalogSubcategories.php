<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog_subcategories".
 *
 * @property integer $id
 * @property string $name
 * @property integer $catalog_id
 *
 * @property CatalogGoods[] $catalogGoods
 * @property Catalog $catalog
 * @property CompanyHasCatalogSubcategories[] $companyHasCatalogSubcategories
 * @property Company[] $companies
 */
class CatalogSubcategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_subcategories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_id'], 'required'],
            [['catalog_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
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
            'catalog_id' => 'Catalog ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogGoods()
    {
        return $this->hasMany(CatalogGoods::className(), ['catalog_subcategories_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalog_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyHasCatalogSubcategories()
    {
        return $this->hasMany(CompanyHasCatalogSubcategories::className(), ['catalog_subcategories_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['id' => 'company_id'])->viaTable('company_has_catalog_subcategories', ['catalog_subcategories_id' => 'id']);
    }
}
