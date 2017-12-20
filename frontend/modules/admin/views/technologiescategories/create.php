<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TechnologiesCategories */

$this->title = 'Create Technologies Categories';
$this->params['breadcrumbs'][] = ['label' => 'Technologies Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technologies-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
