<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;
use kartik\datetime\DateTimePicker;
use kartik\datecontrol\DateControl;
/*use dosamigos\datepicker\DatePicker;
use kartik\switchinput\SwitchInput;

use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;

use app\models\db\PagesCategory;*/

?>

<?php $form = ActiveForm::begin(['id' => 'category_form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="panel panel-default">

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <?= $form->field($model, 'title') ?>
                    </div>
                </div>
            </div>
            <?= $form->field($model, 'file')->fileInput()->label('Логотип вашей компании. 
        Картинка должна быть в формате gif, jpg, png, jpeg и размер не более 1 мбайт 340x240') ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <?= $form->field($model, 'created_at')->widget(DateTimePicker::classname(),[
                            'name' => 'Created',
                            'options' => ['placeholder' => 'Select Created'],
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy hh:ii',
                                'todayHighlight' => true
                            ]
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <?= $form->field($model, 'description')->widget(CKEditor::className(),[
                            'editorOptions' => [
                                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                                'inline' => false, //по умолчанию false
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group" style="text-align: right;">
                <?= Html::submitButton(($model->isNewForm?'Добавить':'Сохранить'), ['class' => 'btn btn-success', 'name' => 'currency-button']) ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group" style="text-align: left;">
                <?= Html::a('Отмена', ['index'], ['class'=>'btn btn-primary']) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>