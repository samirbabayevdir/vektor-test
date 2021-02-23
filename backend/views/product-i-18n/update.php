<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductI18n */

$this->title = Yii::t('app', 'Yenilə ' . \Yii::$app->request->get('lang'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product I18ns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-i18n-update p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>