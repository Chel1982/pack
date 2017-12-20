<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CompanyHasCatalogSubcategories */

$this->title = 'Create Company Has Catalog Subcategories';
$this->params['breadcrumbs'][] = ['label' => 'Company Has Catalog Subcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-has-catalog-subcategories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
