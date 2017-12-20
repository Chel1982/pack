<?php
\frontend\assets\MainAsset::register($this);
?>
<div class="container">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
        <div class="row register">
            <?php $form = \yii\bootstrap\ActiveForm::begin([]) ?>

            <?= $form->field($model, 'name_company')->label('Название организации:') ?>
            <?= $form->field($model, 'username')->label('ФИО получателя:') ?>
            <?= $form->field($model, 'direction_activity')->label('Направление деятельности:') ?>
            <?= $form->field($model, 'address')->label('Почтовый индекс, адрес:') ?>
            <?= $form->field($model, 'phone_number')->label('Телефон / факс:') ?>
            <?= $form->field($model, 'email')->label('Ваш email:') ?>
            <?= $form->field($model, 'product_name')->label('Наименование издания:') ?>
            <?= $form->field($model, 'taxpayer_certificate')->label('Свидетельство налогоплательщика:') ?>
            <?= $form->field($model, 'individual_certificate')->label('ИНН:') ?>
            <?= $form->field($model, 'information')->label('Дополнительная информация:') ?>


            <?= \yii\helpers\Html::submitButton('Регитрация', ['class' => 'btn btn-success']) ?>

            <?php \yii\bootstrap\ActiveForm::end() ?>
        </div>
    </div>
</div>