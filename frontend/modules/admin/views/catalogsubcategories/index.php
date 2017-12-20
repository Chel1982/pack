<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CatalogsubcategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalog Subcategories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-subcategories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Catalog Subcategories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'catalog_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
