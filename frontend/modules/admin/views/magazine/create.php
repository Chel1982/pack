<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Magazine */

$this->title = 'Create Magazine';
$this->params['breadcrumbs'][] = ['label' => 'Magazines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="magazine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
