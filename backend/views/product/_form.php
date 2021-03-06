<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\MenuWidget;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="form-group field-product-category_id has-success">
                <label class="control-label" for="product-category_id">Kateqoriya</label>
                <select id="product-category_id" class="form-control" name="Product[category_id]" aria-invalid="false">
                    <?= MenuWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
                </select>
            </div>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'status')->checkbox(['value' => '1', 'checked' => true]) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'images[]
            ', [
                'template' => '
        <div class="custom-file">
          {input}
          {label}
          {error}
        </div>
    ',
                'labelOptions' => ['class' => 'custom-file-label'],
                'inputOptions' => ['class' => 'custom-file-input'],
            ])->fileInput(['multiple' => true]) ?>
        </div>
    </div>
    <div class="row">
        <?php if (count($model->formimgsurl) > 1) : ?>
            <?php foreach ($model->formimgsurl as $urlid) : ?>

                <div class="col-md-3 speacial__img">
                    <img src="<?= $urlid[0] ?>" alt="">
                    <?= Html::a('<span class="fas fa-trash"></span>', ['/product-img/delete', 'id' => $urlid[1], 'product_id' => $model->id], ['data-method' => 'post', 'class' => 'speacial__img-delete']) ?>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>