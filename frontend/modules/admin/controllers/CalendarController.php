<?php

namespace frontend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Calendar;
use common\models\search\CalendarSearch;

use frontend\models\form\CalendarForm;
/**
 * Pages controller
 */
class CalendarController extends Controller
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new CalendarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        $model = Calendar::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        Calendar::deleteAll(['id' => $id]);

        return $this->redirect(['index']);
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new CalendarForm();
        $model->isNewForm = true;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model_save = new Calendar();

            $model_save->attributes = $model->attributes;
            $model_save->save();

            $model->file = UploadedFile::getInstance($model, 'file');

            if($model->file){
                $modelS = Calendar::findOne(['id' => (int)$model_save->id]);
                //var_dump($id);die();
                $name = $model_save->id . '.' . $model->file->extension;
                $model->file->saveAs('uploads/calendarlogo/' . $name);
                $modelS->path_img = $name;
                $modelS->save();
            }

            return $this->redirect(['index']);

        } else {
            return $this->render('add', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new CalendarForm();

        $model->isNewForm = false;
        $model_save = Calendar::find()->where(['id' => (int)$id])->one();
        $model->attributes = $model_save->attributes;
        $model->time_spending = Yii::$app->formatter->asDateTime($model->time_spending, 'dd-MM-yyyy HH:mm');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model_save->attributes = $model->attributes;
            $model_save->save();

            $model->file = UploadedFile::getInstance($model, 'file');

            if($model->file){
                $modelS = Calendar::findOne(['id' => (int)$id]);
                //var_dump($id);die();
                $name = $id . '.' . $model->file->extension;
                $model->file->saveAs('uploads/calendarlogo/' . $name);
                $modelS->path_img = $name;
                $modelS->save();
            }

            return $this->redirect(['index']);

        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }
}