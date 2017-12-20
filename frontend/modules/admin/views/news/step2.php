<?php
use kartik\datecontrol\DateControl;
?>


<?php $form = \yii\bootstrap\ActiveForm::begin(); ?>

    <div class="row">

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'company_id')->textInput() ?>

        <?= $form->field($model, 'created_at' )->widget(DateControl::className(),[
                'type' => DateControl::FORMAT_DATE,
                'saveFormat' => 'php: U',
        ]) ?>

        <?php echo 'ID News: '. $model->id ?>

        <?= $form->field($model, 'description')->widget(\mihaildev\ckeditor\CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
            ],
        ]); ?>

        <p>Размер картинки должен быть 555x300 px</p>

        <?php
       echo $form->field($model, 'general_image')->widget(\kartik\file\FileInput::classname(),[
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'uploadUrl' => \yii\helpers\Url::to(['file-upload-general']),
                'uploadExtraData' => [
                    'news_id' => $model->id,
                ],
                'allowedFileExtensions' =>  ['jpg', 'png','gif','jpeg'],
                'initialPreview' => $image,
                'showUpload' => true,
                'showRemove' => false,
                'dropZoneEnabled' => false
            ]
        ]);
        ?>

    </div>

    <div class="row">
        <?= \yii\helpers\Html::label('Images'); ?>

        <?= \kartik\file\FileInput::widget([
            'name' => 'images',
            'options' => [
                'accept' => 'image/*',
                'multiple'=>true
            ],
            'pluginOptions' => [
                'uploadUrl' => \yii\helpers\Url::to(['file-upload-images']),
                'uploadExtraData' => [
                    'news_id' => $model->id,
                ],
                'overwriteInitial' => false,
                'allowedFileExtensions' =>  ['jpg', 'png','gif'],
                'initialPreview' => $images_add,
                'showUpload' => true,
                'showRemove' => false,
                'dropZoneEnabled' => false
            ]
        ]);
        ?>

    </div>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php \yii\bootstrap\ActiveForm::end(); ?>