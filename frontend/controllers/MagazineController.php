<?php

namespace frontend\controllers;

use common\models\Magazine;
use common\models\Payment;
use yii\data\Pagination;

class MagazineController extends \yii\web\Controller
{
    public $layout = 'bootstrap';

    public function actionIndex()
    {
        $magazine = Magazine::find()->orderBy(['id' => SORT_DESC])->all();
        $mag = Magazine::find()->offset(1)->limit(8)->orderBy(['id' => SORT_DESC]);

        $countQuery = clone $mag;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
        $pages->pageSizeParam = false;
        $models = $mag->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',[
            'models' => $models,
            'pages' => $pages,
            'magazine' => $magazine,
        ]);
    }

    public function actionMagazineOne()
    {
        $id = \Yii::$app->request->get('id');

        $mag = Magazine::findOne($id);
        $maxId = Magazine::find()->max('id');
        $minId = Magazine::find()->min('id');
        if ($id > 100 and $mag->id == null) {
            $magazine = Magazine::findOne($maxId);

            return $this->render('magazine_one', [
                'magazine' => $magazine,
                'id' => $maxId,
            ]);
        }elseif($id < 100 and $mag->id == null){
            $magazine = Magazine::findOne($minId);

            return $this->render('magazine_one', [
                'magazine' => $magazine,
                'id' => $minId,
            ]);
        }else{
            return $this->render('magazine_one', [
                'magazine' => $mag,
                'id' => $id,
                ]);
        }

    }

    public function actionPayment()
    {
        $model = new Payment();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/']);
        }else{
            return $this->render('form_payment', [
                'model' => $model
            ]);
        }

    }

    public function actionArchive(){
        $magazine = Magazine::find()->orderBy(['id' => SORT_DESC])->all();
        $mag = Magazine::find()->offset(1)->limit(8)->orderBy(['id' => SORT_DESC]);

        $countQuery = clone $mag;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
        $pages->pageSizeParam = false;
        $models = $mag->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('archive',[
            'models' => $models,
            'pages' => $pages,
            'magazine' => $magazine,
        ]);

    }

}
