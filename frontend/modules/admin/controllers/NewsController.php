<?php

namespace frontend\modules\admin\controllers;

use Yii;
use common\models\News;
use common\models\search\NewsSearch;
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
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
    public function actions()
    {
        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                //'url' => 'http://my-site.com/images/', // Directory URL address, where files are stored.
                'path' => '@frontend/web/uploads/news' // Or absolute path to directory where files are stored.
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $image = [];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'image' => $image,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

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
            $this->redirect(Url::to(['/admin/news']));
        }

        $id = \Yii::$app->locator->cache->get('id');
        $model = News::findOne($id);
        $image = [];
        if($general_image = $model->general_image){
            $image[] =  '<img src="/uploads/news/' . $model->id . ' " width=250>';
        }

        $path = Yii::getAlias("@frontend/web/uploads/news/".$model->id);
        $images_add = [];

        try {
            if(is_dir($path)) {
                $files = \yii\helpers\FileHelper::findFiles($path);

                foreach ($files as $file) {
                    if (strstr($file, "small_") && !strstr($file, "general")) {
                        $images_add[] = '<img src="/uploads/news/' . $model->id . '/' . basename($file) . '" width=250>';
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
            $id = Yii::$app->request->post("news_id");
            $path = Yii::getAlias("@frontend/web/uploads/news/".$id);
            BaseFileHelper::createDirectory($path);
            $model = News::findOne($id);

            $file = UploadedFile::getInstance($model,'general_image');
            $name = 'general_image.' . $file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $image  = $path .DIRECTORY_SEPARATOR .$name;
            $new_name = $path .DIRECTORY_SEPARATOR.$name;

            $model->general_image = $name;
            $model->save();

            return true;

        }
    }

    public function actionFileUploadImages()
    {
        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post("news_id");
            $path = Yii::getAlias("@frontend/web/uploads/news/".$id);
            BaseFileHelper::createDirectory($path);
            $file = UploadedFile::getInstanceByName('images');
            $name = $file->name;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            sleep(1);
            return true;

        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['step2']);
           /* $model->general_image = UploadedFile::getInstance($model, 'general_image');

            if($model->general_image){
                $id =  $model->id;
                $path = Yii::getAlias("@frontend/web/uploads/news/");
                BaseFileHelper::createDirectory($path);
                $name = $id . '.' . $model->general_image->extension;
                $model->general_image->saveAs($path .DIRECTORY_SEPARATOR . $name);
                $model->general_image = $name;
                $model->save();
            }*/
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(is_dir('uploads/news/'.$id)){
            rmdir('uploads/news/'.$id);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
