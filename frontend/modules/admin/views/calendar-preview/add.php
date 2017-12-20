<?php

/* @var $this yii\web\View */

use yii\helpers\Html;


$this->title = 'Добавить анонс';
$this->params['breadcrumbs'][] = ['label' => 'Анонсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

    <div class="row">
        <div class="col-lg-12">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>