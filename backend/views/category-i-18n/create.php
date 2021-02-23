<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryI18n */

$this->title = Yii::t('app', 'Kateqoriya: ' . $lang);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category I18ns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-i18n-create p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>