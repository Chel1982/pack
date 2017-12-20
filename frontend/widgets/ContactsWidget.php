<?php

namespace frontend\widgets;

use yii\bootstrap\Widget;
use common\models\ContactsCompany;

class ContactsWidget extends  Widget{

    public function run(){

        $model = ContactsCompany::find()->all();

        return $this->render('contacts', [
            'model' => $model,
        ]);

    }
}