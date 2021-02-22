<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p-4">
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <div class="row">
    <div class="col-md-4">
      <?= $form->field($upload, 'product_id')->dropDownList($products) ?>
    </div>
  </div>
  <div class="row justify-content-center pt-2">
    <div class="col-md-2">
      <?= $form->field($upload, 'image[]
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
    <div class="col-md-10 text-center">
    </div>
  </div>
  <div class="form-group">
    <?= Html::submitButton('Foto Yadda Saxla', ['class' => 'btn btn-success']) ?>
  </div>
  <?php ActiveForm::end(); ?>
</div>