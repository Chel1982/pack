<?php

namespace frontend\controllers;

use common\models\Interview;
use common\models\InterviewCategories;
use common\models\News;
use yii\data\Pagination;
use common\models\NewsCategories;
use common\models\Technologies;
use common\models\TechnologiesCategories;

class SearchController extends \yii\web\Controller
{
    public $layout = 'bootstrap';

    public function actionIndex($news='', $interviews='', $technologies='')
    {
        //var_dump($interviews);die();
        if($news != ''){
        $news = News::find()->filterWhere(['like', 'title', $news]);
        //var_dump($news->count());die();
        $menuNews = NewsCategories::find()->all();

        $newsQuery = clone $news;
        $pagesNews = new Pagination(['totalCount' => $newsQuery->count(), 'pageSize' => 12]);
        //$pagesNews->pageSizeParam = false;
        $modelNews = $news->offset($pagesNews->offset)->limit($pagesNews->limit)->all();
        }

        if($interviews != ''){
            //var_dump($interviews);die();
            $interviews = Interview::find()->filterWhere(['like', 'title', $interviews]);
            //var_dump($news->count());die();
            $menuInter = InterviewCategories::find()->all();

            $newsInter = clone $interviews;
            $pagesInter = new Pagination(['totalCount' => $newsInter->count(), 'pageSize' => 12]);
            //$pagesNews->pageSizeParam = false;
            $modelInter = $interviews->offset($pagesInter->offset)->limit($pagesInter->limit)->all();
        }

        if($technologies != ''){
            //var_dump($interviews);die();
            $technologies = Technologies::find()->filterWhere(['like', 'name', $technologies]);
            //var_dump($news->count());die();
            $menuTech = TechnologiesCategories::find()->all();

            $newsTech = clone $technologies;
            $pagesTech = new Pagination(['totalCount' => $newsTech->count(), 'pageSize' => 12]);
            //$pagesNews->pageSizeParam = false;
            $modelTech = $technologies->offset($pagesInter->offset)->limit($pagesTech->limit)->all();
        }

        return $this->render("index", [
            'modelNews' => $modelNews,
            'pagesNews' => $pagesNews,
            'menuNews' => $menuNews,
            'modelInter' => $modelInter,
            'pagesInter' => $pagesInter,
            'menuInter' => $menuInter,
            'modelTech' => $modelTech,
            'pagesTech' => $pagesTech,
            'menuTech' => $menuTech,
        ]);

    }

}