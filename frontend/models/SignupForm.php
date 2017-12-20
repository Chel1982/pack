<?php
namespace frontend\models;

use common\models\Company;
use common\models\CompanyHasCatalog;
use common\models\CompanyHasCatalogGoods;
use common\models\CompanyHasCatalogSubcategories;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $company_name;
    public $about_company;
    public $address;
    public $file;
    public $number_phone;
    public $web_site;
    public $name_cat;
    public $name_sub;
    public $name_god;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Имя этого пользователя уже существует'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот e-mail уже занят'],

            ['company_name', 'trim'],
            ['company_name', 'required'],
            ['company_name', 'unique', 'targetClass' => '\common\models\Company', 'message' => 'Имя этой компании уже существует'],
            ['company_name', 'string', 'min' => 2, 'max' => 255],

            ['about_company', 'trim'],
            ['about_company', 'string', 'min' => 2, 'max' => 1000],

            ['address', 'trim'],
            ['address', 'string', 'min' => 6, 'max' => 255],

            ['number_phone', 'trim'],
            ['number_phone', 'string', 'min' => 2, 'max' => 255],

            ['web_site', 'trim'],
            ['web_site', 'string', 'min' => 2, 'max' => 255],

            ['file', 'file', 'extensions' => 'png, gif, jpg, jpeg', 'maxSize' => 5024*5024],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['repassword', 'compare', 'compareAttribute' => 'password'],


        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if($this->validate()){
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
        }
    }

    public function signinCompany($user_id)
    {
        $company = new Company();
        $company->company_name = $this->company_name;
        $company->about_company = $this->about_company;
        $company->address = $this->address;
        $company->number_phone = $this->number_phone;
        $company->web_site = $this->web_site;
        $company->user_id = $user_id;

        return $company->save() ? $company : null;
    }

    public function signinCatalogCompany($company_id, $catalog_id)
    {

        $catCom = new CompanyHasCatalog();
        $catCom->company_id = $company_id;
        $catCom->catalog_id = $catalog_id;

        return $catCom->save() ? $catCom : null;

    }

    public function signinCatalogSubCompany($company_id, $catalogSub_id)
    {


            $catSub = new CompanyHasCatalogSubcategories();
            $catSub->company_id = $company_id;
            $catSub->catalog_subcategories_id = $catalogSub_id;

            return $catSub->save() ? $catSub : null;

    }

    public function signinCatalogGoodsCompany($company_id, $catalogGod_id)
    {

            $catGod = new CompanyHasCatalogGoods();
            $catGod->company_id = $company_id;
            $catGod->catalog_goods_id = $catalogGod_id;

            return $catGod->save() ? $catGod : null;

    }
}
