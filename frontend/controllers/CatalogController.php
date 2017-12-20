<?php

namespace frontend\controllers;

use common\models\Articles;
use common\models\Catalog;
use common\models\CatalogGoods;
use common\models\CatalogSubcategories;
use common\models\Company;
use common\models\CompanyHasCatalog;
use common\models\CompanyHasCatalogGoods;
use common\models\CompanyHasCatalogSubcategories;
use common\models\GaleryProd;
use common\models\News;
use common\models\Partner;
use common\models\ProdCompany;
use yii\data\Pagination;

class CatalogController extends \yii\web\Controller
{
    public $layout = 'bootstrap';

    public function actionIndex()
    {

        $cat = Catalog::find()->all();

        $sub = CatalogSubcategories::find()->all();

        $query = Company::find()->orderBy(['status' => SORT_DESC , 'company_name' => SORT_ASC]);
        $partner = Partner::find()->limit(15)->all();

        $countCompany = Company::find()->count();

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        //$pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',[
            'cat' => $cat,
            'sub' => $sub,
            'models' => $models,
            'pages' => $pages,
            'partner' => $partner,
            'countCompany' => $countCompany,
        ]);
    }

    public function actionMenu()
    {
        if (\Yii::$app->request->get('idCat')){
            $idCat = \Yii::$app->request->get('idCat');
            $cat = Catalog::find()->all();
            //var_dump($cat);die();
            $sub = CatalogSubcategories::find()->all();
            $partner = Partner::find()->limit(15)->all();

            $catalog = CompanyHasCatalog::findAll(['catalog_id' => $idCat]);

            foreach ($catalog as $catC) {
                $r[] = $catC['company_id'];
            }

            /*$submenu = CatalogSubcategories::findAll(['catalog_id' => $idCat]);

            foreach ($submenu as $subS){
                $s[] = $subS['id'];
            }*/
            //var_dump($s);die();

            //$submenuHas = CompanyHasCatalogSubcategories::find()->where(['catalog_subcategories_id' => $s]);
            //var_dump($submenuHas);die();
           /* foreach ($submenuHas as $subH){

                foreach ($r as $v){
                    //var_dump($v);die();
                    if ($subH['company_id'] != $v){
                        $r[] = $subH['company_id'];
                    }
                }
            }*/

            /*$goods = CatalogGoods::findAll(['catalog_goods_id' => $s]);

            foreach ($goods as $goodH){
                $g[] = $goodH['id'];
            }*/
            //var_dump($g);die();


            $countCompany = count($r);
            $query = Company::find()->where(['id' => $r])->orderBy(['status' => SORT_DESC, 'company_name' => SORT_ASC]);
            //var_dump($cat);die();
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
            //$pages->pageSizeParam = false;
            $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

            return $this->render('menu',[
                'countCompany' => $countCompany,
                'models' => $models,
                'pages' => $pages,
                'cat' => $cat,
                'sub' => $sub,
                'partner' => $partner,
            ]);
        }
        elseif(\Yii::$app->request->get('idSub')){

        $idSub = \Yii::$app->request->get('idSub');

        $cat = Catalog::find()->all();
        $sub = CatalogSubcategories::find()->all();
        $partner = Partner::find()->limit(15)->all();


        $countCompany = CompanyHasCatalogSubcategories::find()->where(['catalog_subcategories_id' => $idSub])->count();

        $catSub = CompanyHasCatalogSubcategories::findAll(['catalog_subcategories_id' => $idSub]);

        $subG = CatalogSubcategories::findOne(['id' => $idSub]);

        $catGod = CompanyHasCatalogGoods::findAll(['catalog_goods_id' => $subG->id]);

        foreach ($catSub as $catCo) {
            $r[] = $catCo['company_id'];
        }

        foreach ($catGod as $catG) {
            foreach ($r as $v){
                if($catG['company_id'] != $v){
                    $r[] = $catG['company_id'];
                }
            }
        }
        //var_dump($r);die();
        $query = Company::find()->where(['id' => $r])->orderBy(['status' => SORT_DESC, 'company_name' => SORT_ASC]);
        $breadcrumbs = CatalogSubcategories::findOne(['id' => $idSub]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('menu',[
            'cat' => $cat,
            'sub' => $sub,
            'models' => $models,
            'pages' => $pages,
            'partner' => $partner,
            'countCompany' => $countCompany,
            'breadcrumbs' => $breadcrumbs,
        ]);
        }
    }

    public function actionVip()
    {
        $id = \Yii::$app->request->get('id');

        $companyVip = Company::findOne($id);

        $companyV = Company::find()->where(['id' => $id])->andWhere(['status' => 3])->one();

        $news = News::find()->where(['company_id' => $companyV->id])->orderBy(['id' => SORT_DESC])->limit(5)->all();

        $arcticleVip = Articles::find()->where(['company_id' => $id])->all();

        $catalog = CompanyHasCatalogSubcategories::findOne(['company_id' => $id]);
        $catSub = CatalogSubcategories::findOne(['id' => $catalog['catalog_subcategories_id']]);

        $galProd = GaleryProd::find()->where(['company_id' => $id])->limit(15)->all();

        $prodComp = ProdCompany::find()->where(['company_id' => $id])->all();

        return $this->render('vip',[
           'companyVip' => $companyVip,
           'news' => $news,
           'catSub' => $catSub,
           'galProd' => $galProd,
           'arcticleVip' => $arcticleVip,
           'prodComp' => $prodComp,
        ]);

    }

    public function actionPro()
    {
        $id = \Yii::$app->request->get('id');

        $catalog = CompanyHasCatalogSubcategories::findOne(['company_id' => $id]);
        $catSub = CatalogSubcategories::findOne(['id' => $catalog['catalog_subcategories_id']]);

        $companyPro = Company::findOne($id);

        $galProd = GaleryProd::find()->where(['company_id' => $id])->limit(15)->all();
        //var_dump($galProd);die();

        $company = Company::find()->where(['status' => 2])->limit(15)->orderBy(['id' => SORT_DESC])->all();

        return $this->render('pro',[
            'companyPro' => $companyPro,
            'catSub' => $catSub,
            'galProd' => $galProd,
            'company' => $company,
        ]);

    }
    public function actionStart()
    {
        $id = \Yii::$app->request->get('id');

        $catalog = CompanyHasCatalogSubcategories::findOne(['company_id' => $id]);
        $catSub = CatalogSubcategories::findOne(['id' => $catalog['catalog_subcategories_id']]);

        $companyStart = Company::findOne($id);

        $company = Company::find()->where(['status' => 1])->limit(15)->orderBy(['id' => SORT_DESC])->all();


        return $this->render('start',[
            'companyStart' => $companyStart,
            'catSub' => $catSub,
            'company' => $company,
        ]);

    }

    public function actionArticle()
    {
        $id = \Yii::$app->request->get('id');

        $arcticle = Articles::findOne($id);
        //var_dump($arcticle);die();
        $company = Company::find()->where(['status' => 3])->limit(15)->orderBy(['id' => SORT_DESC])->all();

        return $this->render('arcticle',[
            'arcticle' => $arcticle,
            'company' => $company,
        ]);
    }

    public function actionFind($company='')
    {
        $query = Company::find();
        $query->filterWhere(['like', 'company_name', $company])->orderBy(['status' => SORT_DESC , 'company_name' => SORT_ASC]);

        $countCompany = $query->filterWhere(['like', 'company_name', $company])->count();
        //var_dump($countCompany);die();
        $cat = Catalog::find()->all();
        $sub = CatalogSubcategories::find()->all();

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $partner = Partner::find()->limit(15)->all();

        return $this->render("find", [
            'cat' => $cat,
            'model' => $model,
            'sub' => $sub,
            'pages' => $pages,
            'countCompany' => $countCompany,
            'partner' => $partner,
        ]);

    }
}
