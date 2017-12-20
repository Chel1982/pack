<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\InterviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interview-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Interview', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'attribute' => 'dataProvider',
            'value' => function ($model) {
                return \yii\helpers\StringHelper::truncate($model->dataProvider, 50);
            }
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author',
            'position',
           // 'title',
           // 'description:ntext',
            'created_at:date',
             //'updated_at:date',
            // 'interview_categories_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
