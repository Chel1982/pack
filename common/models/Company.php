<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $company_name
 * @property string $about_company
 * @property string $address
 * @property string $number_phone
 * @property string $mobile_phone
 * @property string $web_site
 * @property string $email
 * @property string $general_image
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $speed_work
 * @property integer $quality_control
 * @property integer $service
 * @property integer $recommend
 * @property integer $rating
 * @property integer $status
 * @property integer $user_id
 *
 * @property Articles[] $articles
 * @property User $user
 * @property CompanyHasCatalog[] $companyHasCatalogs
 * @property Catalog[] $catalogs
 * @property CompanyHasCatalogGoods[] $companyHasCatalogGoods
 * @property CatalogGoods[] $catalogGoods
 * @property CompanyHasCatalogSubcategories[] $companyHasCatalogSubcategories
 * @property CatalogSubcategories[] $catalogSubcategories
 * @property GaleryProd[] $galeryProds
 * @property ProdCompany[] $prodCompanies
 * @property Rating[] $ratings
 */
class Company extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['about_company'], 'string'],
            [['user_id'], 'required'],
            [['created_at', 'updated_at', 'speed_work', 'quality_control', 'service', 'recommend', 'rating', 'status', 'user_id'], 'integer'],
            [['company_name', 'address', 'mobile_phone', 'email', 'general_image'], 'string', 'max' => 255],
            [['number_phone', 'web_site'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'about_company' => 'About Company',
            'address' => 'Address',
            'number_phone' => 'Number Phone',
            'mobile_phone' => 'Mobile Phone',
            'web_site' => 'Web Site',
            'email' => 'Email',
            'general_image' => 'General Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'speed_work' => 'Speed Work',
            'quality_control' => 'Quality Control',
            'service' => 'Service',
            'recommend' => 'Recommend',
            'rating' => 'Rating',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyHasCatalogs()
    {
        return $this->hasMany(CompanyHasCatalog::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(Catalog::className(), ['id' => 'catalog_id'])->viaTable('company_has_catalog', ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyHasCatalogGoods()
    {
        return $this->hasMany(CompanyHasCatalogGoods::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogGoods()
    {
        return $this->hasMany(CatalogGoods::className(), ['id' => 'catalog_goods_id'])->viaTable('company_has_catalog_goods', ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyHasCatalogSubcategories()
    {
        return $this->hasMany(CompanyHasCatalogSubcategories::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogSubcategories()
    {
        return $this->hasMany(CatalogSubcategories::className(), ['id' => 'catalog_subcategories_id'])->viaTable('company_has_catalog_subcategories', ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGaleryProds()
    {
        return $this->hasMany(GaleryProd::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdCompanies()
    {
        return $this->hasMany(ProdCompany::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['company_id' => 'id']);
    }
}
