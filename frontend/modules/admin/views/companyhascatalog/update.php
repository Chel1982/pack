<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyHasCatalog */

$this->title = 'Update Company Has Catalog: ' . $model->company_id;
$this->params['breadcrumbs'][] = ['label' => 'Company Has Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_id, 'url' => ['view', 'company_id' => $model->company_id, 'catalog_id' => $model->catalog_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-has-catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
