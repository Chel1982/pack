<?php

namespace frontend\modules\admin\controllers;

use common\models\Company;
use Yii;
use common\models\GaleryProd;
use yii\data\ActiveDataProvider;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Imagine\Image\Point;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * GaleryprodController implements the CRUD actions for GaleryProd model.
 */
class GaleryprodController extends Controller
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
     * Lists all GaleryProd models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => GaleryProd::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GaleryProd model.
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
     * Creates a new GaleryProd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GaleryProd();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['step2']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionStep2(){

        $model = $this->findModel(\Yii::$app->locator->cache->get('id'));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->redirect(Url::to(['/cabinet/galeryprod']));
        }

        $id = \Yii::$app->locator->cache->get('id');
        $model = GaleryProd::findOne($id);
        $image = [];
        if($general_image = $model->image){
            $image[] =  '<img src="/uploads/galeryprod/' . $model->id . ' " width=250>';
        }

        $path = Yii::getAlias("@frontend/web/uploads/galeryprod/".$model->id);
        $images_add = [];

        try {
            if(is_dir($path)) {
                $files = \yii\helpers\FileHelper::findFiles($path);

                foreach ($files as $file) {
                    if (strstr($file, "small_") && !strstr($file, "general")) {
                        $images_add[] = '<img src="/uploads/galeryprod/' . $model->id . '/' . basename($file) . '" width=250>';
                    }
                }
            }
        }
        catch(\yii\base\Exception $e){}


        return $this->render("step2",['model' => $model,'image' => $image, 'images_add' => $images_add]);
    }

    public function actionFileUploadGeneral()
    {


        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post("galprod_id");
            $path = Yii::getAlias("@frontend/web/uploads/galprod/".$id);
            BaseFileHelper::createDirectory($path);
            $model = GaleryProd::findOne($id);
            $file = UploadedFile::getInstance($model,'image');
            $name = $file->name;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $model->image = $name;
            $model->save();

            $image  = $path .DIRECTORY_SEPARATOR .$name;
            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];
            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(225,205))
                ->save($name, ['quality' => 100]);

            return true;

        }
    }


    /**
     * Updates an existing GaleryProd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['step2']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GaleryProd model.
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
     * Finds the GaleryProd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GaleryProd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GaleryProd::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
