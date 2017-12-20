<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BannerGrief */

$this->title = 'Create BannerGrief';
$this->params['breadcrumbs'][] = ['label' => 'BannersGrief', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
