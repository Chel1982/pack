<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AboutProject */

$this->title = 'Create About Project';
$this->params['breadcrumbs'][] = ['label' => 'About Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
