<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AboutI18n */

$this->title = 'Yarat, Haqqımızda, ' . $lang;
$this->params['breadcrumbs'][] = ['label' => 'About I18ns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-i18n-create p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>