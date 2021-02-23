<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AboutI18n */

$this->title = 'Update About I18n: ' . $model->lang;
$this->params['breadcrumbs'][] = ['label' => 'About I18ns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="about-i18n-update p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>