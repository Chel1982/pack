<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyHasCatalog */

$this->title = $model->company_id;
$this->params['breadcrumbs'][] = ['label' => 'Company Has Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-has-catalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'company_id' => $model->company_id, 'catalog_id' => $model->catalog_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'company_id' => $model->company_id, 'catalog_id' => $model->catalog_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'company_id',
            'catalog_id',
        ],
    ]) ?>

</div>
