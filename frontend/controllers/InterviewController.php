<?php

namespace frontend\controllers;

use common\models\Interview;
use common\models\InterviewCategories;
use yii\data\Pagination;

class InterviewController extends \yii\web\Controller
{
    public $layout = 'bootstrap';

    public function actionIndex()
    {
        $menu = InterviewCategories::find()->all();
        $query = Interview::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',[
            'menu' => $menu,
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    public function actionMenu()
    {
        $id = \Yii::$app->request->get('id');

        $menu = InterviewCategories::find()->all();
        $query = Interview::find()->where(['interview_categories_id' => $id]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('menu',[
            'models' => $models,
            'menu' => $menu,
            'pages' => $pages,
        ]);
    }

    public function actionNew()
    {
        $id = \Yii::$app->request->get('id');

        $new = Interview::findOne($id);

        Interview::updateAllCounters(['count_view' => 1],['id' => $id]);

        $catNew = InterviewCategories::findOne($new->interview_categories_id);

        $likeInt = Interview::find()->where(['interview_categories_id' => $catNew->id])->limit(15)->all();

        return $this->render('new',[
            'new' => $new,
            'catNew' => $catNew,
            'likeInt' => $likeInt,
        ]);
    }

}
