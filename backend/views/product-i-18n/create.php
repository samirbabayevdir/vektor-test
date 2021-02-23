<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductI18n */

$this->title = Yii::t('app', 'Yarat ' . \Yii::$app->request->get('lang'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product I18ns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-i18n-create p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>