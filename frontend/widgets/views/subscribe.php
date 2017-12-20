<?php
$form = \yii\bootstrap\ActiveForm::begin([
    'enableAjaxValidation' => true,
    'validationUrl' => \yii\helpers\Url::to(['/validate/subscribe']),
    'options' => ['class' => 'news-link-form']
]);
?>

<?= $form->field($model,'email')->textInput(['placeholder' => 'email'])->label(false) ?>

<?= \yii\helpers\Html::submitButton('ПОДПИСАТЬСЯ', ['class' => 'main-subscribe-button']) ?>

<?php \yii\bootstrap\ActiveForm::end(); ?>