<?php

use yii\helpers\Html;

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Yii::$app->name ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta http-equiv="x-rim-auto-match" content="none">
    <?=Html::csrfMetaTags() ?>
    <?php $this->head() ?>

</head>
<body>

<?php $this->beginBody() ?>
<?php if(Yii::$app->session->hasFlash('message')): ?>

    <?php
    $success = Yii::$app->session->getFlash('message');

    echo \yii\bootstrap\Alert::widget([
        'options' => [
            'class' => 'alert-info'
        ],
        'body' => $success
    ])
    ?>
<?php endif; ?>

<?=$this->render("//common/head") ?>

<?=$content ?>

<?=$this->render("//common/footer") ?>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>



