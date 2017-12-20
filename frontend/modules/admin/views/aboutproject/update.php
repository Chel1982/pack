<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AboutProject */

$this->title = 'Update About Project: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'About Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="about-project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
