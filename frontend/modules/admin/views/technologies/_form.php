<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Technologies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'technologies_categories_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\TechnologiesCategories::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
