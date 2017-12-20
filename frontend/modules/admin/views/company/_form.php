<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about_company')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'web_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'quality_control')->textInput() ?>

    <?= $form->field($model, 'service')->textInput() ?>


    <?= $form->field($model, 'speed_work')->textInput() ?>

    <?= $form->field($model, 'recommend')->textInput() ?>

    <?= $form->field($modelCompany, 'file')->fileInput()->label('Логотип вашей компании. 
        Картинка должна быть в формате gif, jpg, png, jpeg и размер не более 1 мбайта') ?>

    <?php foreach($catalog as $cat): ?>

            <?= $form->field($modelCompany, 'name_cat')->checkbox(['name' => 'name_cat_'.$cat['id'], 'checked ' => (\common\models\CompanyHasCatalog::find()->where(['company_id'=> $model->id, 'catalog_id' => $cat['id']])->exists()) ? true : false])->label($cat['name'])?>

            <?php foreach($catalogSub as $catS): ?>

                <?php if ($catS['catalog_id'] == $cat['id']): ?>

                    <?= $form->field($modelCompany, 'name_sub')->checkbox(['name' => 'name_sub_'.$catS['id'], 'checked ' => (\common\models\CompanyHasCatalogSubcategories::find()->where(['company_id'=> $model->id, 'catalog_subcategories_id' => $catS['id']])->exists()) ? true : false ])->label($catS['name']) ?>

                    <?php foreach ($catalogGod as $catG): ?>

                        <?php if($catG['catalog_subcategories_id'] == $catS['id']): ?>

                            <?= $form->field($modelCompany, 'name_god')->checkbox(['name' => 'name_god_'.$catG['id'], 'checked ' => (\common\models\CompanyHasCatalogGoods::find()->where(['company_id'=> $model->id, 'catalog_goods_id' => $catG['id']])->exists())  ? true : false])->label($catG['name']) ?>

                        <?php endif; ?>

                    <?php endforeach; ?>

                <?php endif; ?>

        <?php endforeach; ?>

        <?php endforeach; ?>


    <?php $user = \common\models\User::findOne(['id' => $model->user_id]) ?>

    <?= '<b>Имя пользователя: </b><br>' . $user->username ?>

    <?= $form->field($model, 'user_id')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
