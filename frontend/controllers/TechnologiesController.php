<?php

namespace frontend\controllers;

use common\models\Technologies;
use common\models\TechnologiesCategories;
use yii\data\Pagination;

class TechnologiesController extends \yii\web\Controller
{

    public $layout = 'bootstrap';

    public function actionIndex()
    {
        $menu = TechnologiesCategories::find()->all();
        $query = Technologies::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 2]);
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

        $menu = TechnologiesCategories::find()->all();
        $query = Technologies::find()->where(['technologies_categories_id' => $id]);

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

    public function actionTechnology()
    {
        $id = \Yii::$app->request->get('id');

        $new = Technologies::findOne($id);

        Technologies::updateAllCounters(['count_view' => 1],['id' => $id]);

        $catNew = TechnologiesCategories::findOne($new->technologies_categories_id);

        $likeTech = Technologies::find()->where(['technologies_categories_id' => $catNew->id])->limit(15)->all();


        return $this->render('technology',[
            'new' => $new,
            'catNew' => $catNew,
            'likeTech' => $likeTech,
        ]);
    }

}
