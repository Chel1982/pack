<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyHasCatalogSubcategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-has-catalog-subcategories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Company::find()->all(), 'id', 'company_name')) ?>

    <?= $form->field($model, 'catalog_subcategories_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\CatalogSubcategories::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
