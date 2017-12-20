<?php $form = \yii\bootstrap\ActiveForm::begin(); ?>

    <div class="row">

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'site_url')->textInput(['maxlength' => true]) ?>

        <?php echo 'ID Журнала: '. $model->id ?>

        <?= $form->field($model, 'description')->widget(\mihaildev\ckeditor\CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
            ],
        ]); ?>

        <?= $form->field($model, 'created_at' )->widget(\kartik\datecontrol\DateControl::className(),[
            'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
            'saveFormat' => 'php: U',
        ]) ?>

        <p>Размер картинки должен быть 260x355 px</p>

        <?php
       echo $form->field($model, 'general_image')->widget(\kartik\file\FileInput::classname(),[
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'uploadUrl' => \yii\helpers\Url::to(['file-upload-general']),
                'uploadExtraData' => [
                    'magazine_id' => $model->id,
                ],
                'allowedFileExtensions' =>  ['jpg', 'png','gif'],
                'initialPreview' => $image,
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