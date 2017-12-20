<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_has_catalog_subcategories".
 *
 * @property integer $company_id
 * @property integer $catalog_subcategories_id
 *
 * @property CatalogSubcategories $catalogSubcategories
 * @property Company $company
 */
class CompanyHasCatalogSubcategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_has_catalog_subcategories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'catalog_subcategories_id'], 'required'],
            [['company_id', 'catalog_subcategories_id'], 'integer'],
            [['catalog_subcategories_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogSubcategories::className(), 'targetAttribute' => ['catalog_subcategories_id' => 'id']],
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
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
