<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyHasCatalogGoods */

$this->title = 'Update Company Has Catalog Goods: ' . $model->company_id;
$this->params['breadcrumbs'][] = ['label' => 'Company Has Catalog Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_id, 'url' => ['view', 'company_id' => $model->company_id, 'catalog_goods_id' => $model->catalog_goods_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-has-catalog-goods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
