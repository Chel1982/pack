<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MagazineArticle */

$this->title = 'Create Magazine Article';
$this->params['breadcrumbs'][] = ['label' => 'Magazine Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="magazine-article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
