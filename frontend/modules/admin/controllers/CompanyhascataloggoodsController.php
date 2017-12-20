<?php

namespace frontend\modules\admin\controllers;

use Yii;
use common\models\CompanyHasCatalogGoods;
use common\models\search\CompanyhascataloggoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanyhascataloggoodsController implements the CRUD actions for CompanyHasCatalogGoods model.
 */
class CompanyhascataloggoodsController extends Controller
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
     * Lists all CompanyHasCatalogGoods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanyhascataloggoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CompanyHasCatalogGoods model.
     * @param integer $company_id
     * @param integer $catalog_goods_id
     * @return mixed
     */
    public function actionView($company_id, $catalog_goods_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($company_id, $catalog_goods_id),
        ]);
    }

    /**
     * Creates a new CompanyHasCatalogGoods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CompanyHasCatalogGoods();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'company_id' => $model->company_id, 'catalog_goods_id' => $model->catalog_goods_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CompanyHasCatalogGoods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $company_id
     * @param integer $catalog_goods_id
     * @return mixed
     */
    public function actionUpdate($company_id, $catalog_goods_id)
    {
        $model = $this->findModel($company_id, $catalog_goods_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'company_id' => $model->company_id, 'catalog_goods_id' => $model->catalog_goods_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CompanyHasCatalogGoods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $company_id
     * @param integer $catalog_goods_id
     * @return mixed
     */
    public function actionDelete($company_id, $catalog_goods_id)
    {
        $this->findModel($company_id, $catalog_goods_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CompanyHasCatalogGoods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $company_id
     * @param integer $catalog_goods_id
     * @return CompanyHasCatalogGoods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($company_id, $catalog_goods_id)
    {
        if (($model = CompanyHasCatalogGoods::findOne(['company_id' => $company_id, 'catalog_goods_id' => $catalog_goods_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
