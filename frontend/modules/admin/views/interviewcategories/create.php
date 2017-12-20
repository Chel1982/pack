<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InterviewCategories */

$this->title = 'Create Interview Categories';
$this->params['breadcrumbs'][] = ['label' => 'Interview Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interview-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>