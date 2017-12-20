<?php

namespace frontend\modules\admin\controllers;

use common\models\Catalog;
use common\models\CatalogGoods;
use common\models\CatalogSubcategories;
use common\models\CompanyHasCatalog;
use common\models\CompanyHasCatalogGoods;
use common\models\CompanyHasCatalogSubcategories;
use frontend\models\SignupForm;
use Yii;
use common\models\Company;
use common\models\search\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $catalog = Catalog::find()->all();

        $catalogSub = CatalogSubcategories::find()->all();

        $catalogGod = CatalogGoods::find()->all();

        $model = new Company();

        $modelCompany = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                $company_id = $model->id;
                $user_id = $model->user_id;
                //var_dump($company_id);die();

                foreach ($catalog as $cat) {
                    if (\Yii::$app->request->post('name_cat_' . $cat['id'])) {
                        $catalog_id = \Yii::$app->request->post('name_cat_' . $cat['id']);
                        $modelCompany->signinCatalogCompany($company_id, $catalog_id);
                    }
                }

                foreach ($catalogSub as $catS) {
                    if (\Yii::$app->request->post('name_sub_' . $catS['id'])) {
                        $catalogSub_id = \Yii::$app->request->post('name_sub_' . $catS['id']);
                        $modelCompany->signinCatalogSubCompany($company_id, $catalogSub_id);
                    }
                }

                foreach ($catalogGod as $catG) {
                    if (\Yii::$app->request->post('name_god_' . $catG['id'])) {
                        $catalogGod_id = \Yii::$app->request->post('name_god_' . $catG['id']);
                        $modelCompany->signinCatalogGoodsCompany($company_id, $catalogGod_id);
                    }
                }

            $modelCompany->file = UploadedFile::getInstance($modelCompany, 'file');


            if($modelCompany->file){
                $name = $company_id .'.'. $modelCompany->file->extension;
                $model->general_image = $name;
                $model->save();
                //var_dump($name);die();
                $modelCompany->file->saveAs('uploads/logotype/' . $name);
            }

            return $this->redirect(['view',
                'id' => $model->id,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'catalog' => $catalog,
                'catalogSub' => $catalogSub,
                'catalogGod' => $catalogGod,
                'modelCompany' => $modelCompany,
            ]);
        }
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelCompany = new SignupForm();

        $catalog = Catalog::find()->all();

        $catalogSub = CatalogSubcategories::find()->all();

        $catalogGod = CatalogGoods::find()->all();

        $catalogHas = CompanyHasCatalog::findAll(['company_id' => $id]);

        $catalogSubHas = CompanyHasCatalogSubcategories::findAll(['company_id' => $id]);

        $catalogGodHas = CompanyHasCatalogGoods::findAll(['company_id' => $id]);

        $model = $this->findModel($id);

        if(\Yii::$app->request->isAjax && \Yii::$app->request->isPost){
            if($model->load(\Yii::$app->request->post())) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $company_id = $model->id;

            foreach($catalogHas as $catHas){

                if (\Yii::$app->request->post('name_cat_' . $catHas['catalog_id']) == '0') {

                $catHasDel = CompanyHasCatalog::find()->where(['company_id' => $id])->andWhere(['catalog_id' => $catHas['catalog_id']])->one();
                $catHasDel->delete();

                }
            }

            foreach ($catalog as $cat){
                if (\Yii::$app->request->post('name_cat_' . $cat['id']) == '1') {

                    if(!CompanyHasCatalog::find()->where(['company_id'=> $company_id,'catalog_id' => $cat['id']])->exists()){
                        $modelCompany->signinCatalogCompany($company_id, $cat['id']);
                    }
                }
            }


            foreach($catalogSubHas as $catSH){

                if (\Yii::$app->request->post('name_sub_' . $catSH['catalog_subcategories_id']) == '0') {

                    $catHasDel = CompanyHasCatalogSubcategories::find()->where(['company_id' => $id])->andWhere(['catalog_subcategories_id' => $catSH['catalog_subcategories_id']])->one();
                    $catHasDel->delete();

                }
            }

            foreach ($catalogSub as $catS){
                if (\Yii::$app->request->post('name_sub_' . $catS['id']) == '1') {

                    if(!CompanyHasCatalogSubcategories::find()->where(['company_id'=> $company_id, 'catalog_subcategories_id' => $catS['id']])->exists()){
                        $modelCompany->signinCatalogSubCompany($company_id, $catS['id']);
                    }
                }
            }

            foreach($catalogGodHas as $catGH){

                if (\Yii::$app->request->post('name_god_' . $catGH['catalog_goods_id']) == '0') {

                    $catHasDel = CompanyHasCatalogGoods::find()->where(['company_id' => $id])->andWhere(['catalog_goods_id' => $catGH['catalog_goods_id']])->one();
                    $catHasDel->delete();
                }
            }

            foreach ($catalogGod as $catG){
                if (\Yii::$app->request->post('name_god_' . $catG['id']) == '1') {

                    if(!CompanyHasCatalogGoods::find()->where(['company_id'=> $company_id, 'catalog_goods_id' => $catG['id']])->exists()){
                        $modelCompany->signinCatalogGoodsCompany($company_id, $catG['id']);
                    }
                }
            }


            $modelCompany->file = UploadedFile::getInstance($modelCompany, 'file');

            if($modelCompany->file){
                $name = $company_id .'.'. $modelCompany->file->extension;
                $model->general_image = $name;
                $model->save();
                $modelCompany->file->saveAs('uploads/logotype/' . $name);
            }

                return $this->redirect(['view',
                    'id' => $model->id,
                    'modelCompany' => $modelCompany,

                ]);

        } else {
            return $this->render('update', [
                'model' => $model,
                'catalog' => $catalog,
                'catalogSub' => $catalogSub,
                'catalogGod' => $catalogGod,
                'catalogHas' => $catalogHas,
                'catalogSubHas' => $catalogSubHas,
                'catalogGodHas' => $catalogGodHas,
                'modelCompany' => $modelCompany,
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
