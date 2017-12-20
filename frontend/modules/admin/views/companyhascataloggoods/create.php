<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CompanyHasCatalogGoods */

$this->title = 'Create Company Has Catalog Goods';
$this->params['breadcrumbs'][] = ['label' => 'Company Has Catalog Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-has-catalog-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
