<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MagazineArticle */

$this->title = 'Update Magazine Article: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Magazine Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="magazine-article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
