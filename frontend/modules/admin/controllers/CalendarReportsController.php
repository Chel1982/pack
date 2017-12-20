<?php
namespace frontend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\CalendarReports;
use common\models\search\CalendarReportsSearch;
use yii\web\UploadedFile;

use frontend\models\form\CalendarReportsForm;
/**
 * Pages controller
 */
class CalendarReportsController extends Controller
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

        $searchModel = new CalendarReportsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        $model = CalendarReports::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        CalendarReports::deleteAll(['id' => $id]);

        return $this->redirect(['index']);
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new CalendarReportsForm();
        $model->isNewForm = true;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model_save = new CalendarReports();

            $model_save->attributes = $model->attributes;
            $model_save->save();

            $model->file = UploadedFile::getInstance($model, 'file');

            if($model->file){
                $modelS = CalendarReports::findOne(['id' => (int)$model_save->id]);
                //var_dump($id);die();
                $name = $model_save->id . '.' . $model->file->extension;
                $model->file->saveAs('uploads/calendarreports/' . $name);
                $modelS->general_image = $name;
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

        $model = new CalendarReportsForm();

        $model->isNewForm = false;
        $model_save = CalendarReports::find()->where(['id' => (int)$id])->one();
        $model->attributes = $model_save->attributes;
        $model->created_at = Yii::$app->formatter->asDateTime($model->created_at, 'dd-MM-yyyy HH:mm');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model_save->attributes = $model->attributes;
            $model_save->save();


            $model->file = UploadedFile::getInstance($model, 'file');

            if($model->file){
                $modelS = CalendarReports::findOne(['id' => (int)$id]);
                //var_dump($id);die();
                $name = $id . '.' . $model->file->extension;
                $model->file->saveAs('uploads/calendarreports/' . $name);
                $modelS->general_image = $name;
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