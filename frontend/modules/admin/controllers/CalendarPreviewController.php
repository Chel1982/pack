<?php
namespace frontend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\CalendarPreview;
use common\models\search\CalendarPreviewSearch;

use frontend\models\form\CalendarPreviewForm;
/**
 * Pages controller
 */
class CalendarPreviewController extends Controller
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

        $searchModel = new CalendarPreviewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        $model = CalendarPreview::find()->where(['id' => $id])->one();

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        CalendarPreview::deleteAll(['id' => $id]);

        return $this->redirect(['index']);
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new CalendarPreviewForm();
        $model->isNewForm = true;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model_save = new CalendarPreview();

            $model_save->attributes = $model->attributes;
            $model_save->save();

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

        $model = new CalendarPreviewForm();

        $model->isNewForm = false;
        $model_save = CalendarPreview::find()->where(['id' => (int)$id])->one();
        $model->attributes = $model_save->attributes;
        $model->time_spending = Yii::$app->formatter->asDateTime($model->time_spending, 'dd-MM-yyyy HH:mm');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model_save->attributes = $model->attributes;
            $model_save->save();

            return $this->redirect(['index']);

        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }
}