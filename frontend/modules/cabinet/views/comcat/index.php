<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Has Catalogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-has-catalog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Company Has Catalog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'company_id',
            'catalog_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
