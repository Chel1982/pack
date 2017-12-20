<?php

namespace frontend\controllers;

use common\models\NewsCategories;
use common\models\News;
use yii\data\Pagination;

class NewsController extends \yii\web\Controller
{
    public $layout = 'bootstrap';

    public function actionIndex()
    {
        $menu = NewsCategories::find()->all();
        $query = News::find()->orderBy(['id' => SORT_DESC]);

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
        $menu = NewsCategories::find()->all();
        $query = News::find()->where(['news_categories_id' => $id]);
        //var_dump($query);die();
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

        News::updateAllCounters(['count_view' => 1],['id' => $id]);

        $new = News::findOne($id);
        $catNew = NewsCategories::findOne($new->news_categories_id);

        $likeNews = News::find()->where(['news_categories_id' => $catNew->id])->limit(15)->all();

        return $this->render('new',[
            'new' => $new,
            'catNew' => $catNew,
            'likeNews' => $likeNews,
        ]);
    }

}
