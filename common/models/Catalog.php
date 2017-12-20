<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property string $name
 * @property string $general_image
 *
 * @property CatalogSubcategories[] $catalogSubcategories
 * @property CompanyHasCatalog[] $companyHasCatalogs
 * @property Company[] $companies
 */
class Catalog extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','general_image'], 'string', 'max' => 255],
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
            'general_image' => 'General Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogSubcategories()
    {
        return $this->hasMany(CatalogSubcategories::className(), ['catalog_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyHasCatalogs()
    {
        return $this->hasMany(CompanyHasCatalog::className(), ['catalog_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['id' => 'company_id'])->viaTable('company_has_catalog', ['catalog_id' => 'id']);
    }
}
