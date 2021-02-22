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


    <?= $form->field($model, 'status')->checkbox(['value' => '1', 'checked' => true]) ?>



    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

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