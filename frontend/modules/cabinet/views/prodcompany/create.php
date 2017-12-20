<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProdCompany */

$this->title = 'Create Prod Company';
$this->params['breadcrumbs'][] = ['label' => 'Prod Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prod-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
