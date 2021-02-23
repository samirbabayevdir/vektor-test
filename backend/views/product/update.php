<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Məhsulu Yenilə: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('EN', ['/product-i-18n/lang', 'id' => $model->id, 'lang' => 'en-US'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('RU', ['/product-i-18n/lang', 'id' => $model->id, 'lang' => 'ru-RU'], ['class' => 'btn btn-primary']) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>