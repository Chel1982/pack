<?php
\frontend\assets\MainAsset::register($this);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
            <div class="register">
                <br>
                <?php

                $form = \yii\bootstrap\ActiveForm::begin([
                    'enableClientValidation' => false,
                    'enableAjaxValidation' => true,
                    'options' => ['enctype' => 'multipart/form-data'],
                ])
                ?>

                <?= $form->field($model, 'username')->label('Пользователь') ?>
                <?= $form->field($model, 'email')->label('Ваш e-mail') ?>
                <?= $form->field($model, 'company_name')->label('Название вашей компании') ?>
                <?= $form->field($model, 'about_company')->textarea(['rows' => 6])->label('О компании') ?>
                <?= $form->field($model, 'address')->label('Адресс') ?>
                <?= $form->field($model, 'number_phone')->label('Телефон') ?>
                <?= $form->field($model, 'web_site')->label('Ваш web-site') ?>
                <?= $form->field($model, 'file')->fileInput()->label('Логотип вашей компании. 
        Картинка должна быть в формате gif, jpg, png, jpeg и размер не более 1 мбайта') ?>

                <?php foreach ($catalog as $cat): ?>

                    <?= $form->field($model, 'name_cat')->checkbox(['name' => 'name_cat_' . $cat['id'], 'value' => $cat['id']])->label($cat['name']) ?>

                    <?php foreach ($catalogSub as $catS): ?>

                        <?php if ($cat['id'] === $catS['catalog_id']): ?>

                            <?= $form->field($model, 'name_sub')->checkbox(['name' => 'name_sub_' . $catS['id'], 'value' => $catS['id']])->label($catS['name']) ?>

                            <?php foreach ($catalogGod as $catG): ?>

                                <?php if ($catS['id'] === $catG['catalog_subcategories_id']): ?>

                                    <?= $form->field($model, 'name_god')->checkbox(['name' => 'name_god_' . $catG['id'], 'value' => $catG['id']])->label($catG['name']) ?>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    <?php endforeach; ?>

                <?php endforeach; ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Введите пароль') ?>

                <?= $form->field($model, 'repassword')->passwordInput()->label('Повторите введенный пароль') ?>

                <?= \yii\helpers\Html::submitButton('Регитрация', ['class' => 'btn-register']) ?>

                <?php \yii\bootstrap\ActiveForm::end() ?>

            </div>
        </div>
    </div>
</div>
