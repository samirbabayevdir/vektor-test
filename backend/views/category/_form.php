<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

  <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
  ]); ?>

  <div class="row justify-content-center pt-4">
    <div class="col-md-4">
      <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
      <div class="form-group field-category-parent_id has-success">
        <label class="control-label" for="category-parent_id">Valideyn Kateqoriyası</label>
        <select id="category-parent_id" class="form-control" name="Category[parent_id]" aria-invalid="false">
          <option value="0">Baş Kateqoriya</option>
          <?= \common\widgets\MenuWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
        </select>
      </div>
    </div>
  </div>
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
      <?= Html::img($model->getImageUrl(), ['alt' => $model->name, 'style' => 'width:150px']) ?>
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
      <?= Html::img($model->getImage_bannerUrl(), ['alt' => $model->name, 'style' => 'width:150px']) ?>
    </div>
  </div>

  <div class="row justify-content-center pt-4">
    <div class="col-8">
      <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>
  </div>
  <div class="row justify-content-center pt-4">
    <div class="col-md-4">
      <?= $form->field($model, 'status')->checkbox(['value' => '1', 'checked' => true]) ?>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
      </div>
    </div>
  </div>

  <?php ActiveForm::end(); ?>

</div>