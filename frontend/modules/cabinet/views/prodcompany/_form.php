<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdCompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prod-company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $id = \Yii::$app->user->identity->getId(); ?>

    <?= $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Company::find()->where(['user_id' => $id])->all(), 'id', 'company_name'))  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
