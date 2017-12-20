<?php

namespace frontend\controllers;

use common\models\Contacts;
use common\models\ContactsCompany;
use yii\web\Controller;

class ContactsController extends Controller
{
    public $layout = 'bootstrap';
    public function actionIndex()
    {
        $model = Contacts::find()->all();
        $modelC = ContactsCompany::find()->all();
        return $this->render('index', [
            'model' => $model,
            'modelC' => $modelC
        ]);
    }

}
