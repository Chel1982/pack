<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AboutProject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?/*= $form->field($model, 'about_project')->textarea(['rows' => 6]) */?>

    <?= $form->field($model, 'about_project')->widget(\mihaildev\ckeditor\CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
