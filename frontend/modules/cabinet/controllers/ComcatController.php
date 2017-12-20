<?php

namespace frontend\modules\cabinet\controllers;

use common\controllers\AuthController;
use Yii;
use common\models\CompanyHasCatalog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComcatController implements the CRUD actions for CompanyHasCatalog model.
 */
class ComcatController extends AuthController
{
    /**
     * @inheritdoc
     */
   /* public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

    /**
     * Lists all CompanyHasCatalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CompanyHasCatalog::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CompanyHasCatalog model.
     * @param integer $company_id
     * @param integer $catalog_id
     * @return mixed
     */
    public function actionView($company_id, $catalog_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($company_id, $catalog_id),
        ]);
    }

    /**
     * Creates a new CompanyHasCatalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CompanyHasCatalog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'company_id' => $model->company_id, 'catalog_id' => $model->catalog_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CompanyHasCatalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $company_id
     * @param integer $catalog_id
     * @return mixed
     */
    public function actionUpdate($company_id, $catalog_id)
    {
        $model = $this->findModel($company_id, $catalog_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'company_id' => $model->company_id, 'catalog_id' => $model->catalog_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CompanyHasCatalog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $company_id
     * @param integer $catalog_id
     * @return mixed
     */
    public function actionDelete($company_id, $catalog_id)
    {
        $this->findModel($company_id, $catalog_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CompanyHasCatalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $company_id
     * @param integer $catalog_id
     * @return CompanyHasCatalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($company_id, $catalog_id)
    {
        if (($model = CompanyHasCatalog::findOne(['company_id' => $company_id, 'catalog_id' => $catalog_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
