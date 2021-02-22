<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Məhsul Yarat';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // 'upload' => $upload,
    ]) ?>

</div>