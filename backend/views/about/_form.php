<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\About */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-form p-4">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'description_one')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <?= $form->field($model, 'description_two')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <div class="row justify-content-center pt-4">
        <div class="col-md-4">
            <?= $form->field($model, 'imageFile', [
                'template' => '
          <div class="custom-file">
            {input}
            {label}
            {error}
          </div>
                ',
                'labelOptions' => ['class' => 'custom-file-label'],
                'inputOptions' => ['class' => 'custom-file-input'],
            ])->textInput(['type' => 'file']) ?>
        </div>
        <div class="col-md-4 text-center">
            <?= Html::img($model->getImageUrl(), ['style' => 'width:150px']) ?>
        </div>
    </div>
    <div class="row justify-content-center pt-2">
        <div class="col-md-4">
            <?= $form->field($model, 'image_bannerFile', [
                'template' => '
        <div class="custom-file">
          {input}
          {label}
          {error}
        </div>
    ',
                'labelOptions' => ['class' => 'custom-file-label'],
                'inputOptions' => ['class' => 'custom-file-input'],
            ])->textInput(['type' => 'file']) ?>
        </div>
        <div class="col-md-4 text-center">
            <?= Html::img($model->getImage_bannerUrl(), ['style' => 'width:150px']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>