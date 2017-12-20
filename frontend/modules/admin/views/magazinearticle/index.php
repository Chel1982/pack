<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MagazinearticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Magazine Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="magazine-article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Magazine Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'description:ntext',
            'site_url:url',
            'status',
            'magazine_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
