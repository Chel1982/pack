<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Interview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interview-form">

    <?php $form = ActiveForm::begin(); ?>

    <?/*= $form->field($model, 'author')->textInput(['maxlength' => true]) */?><!--

    <?/*= $form->field($model, 'position')->textInput(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'title')->textInput(['maxlength' => true]) */?>

    --><?/*= $form->field($model, 'description')->textarea(['rows' => 6]) */?>

    <?= $form->field($model, 'interview_categories_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\InterviewCategories::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
