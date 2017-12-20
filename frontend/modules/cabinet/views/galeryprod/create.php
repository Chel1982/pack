<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GaleryProd */

$this->title = 'Create Galery Prod';
$this->params['breadcrumbs'][] = ['label' => 'Galery Prods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galery-prod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
