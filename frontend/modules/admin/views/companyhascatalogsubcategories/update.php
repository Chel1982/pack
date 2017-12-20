<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyHasCatalogSubcategories */

$this->title = 'Update Company Has Catalog Subcategories: ' . $model->company_id;
$this->params['breadcrumbs'][] = ['label' => 'Company Has Catalog Subcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_id, 'url' => ['view', 'company_id' => $model->company_id, 'catalog_subcategories_id' => $model->catalog_subcategories_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-has-catalog-subcategories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
