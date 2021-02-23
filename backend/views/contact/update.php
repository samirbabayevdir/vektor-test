<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */

$this->title = 'Yenilə, Əlaqə: ';
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<div class="contact-update p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('EN', ['/contact-i-18n/lang', 'id' => $model->id, 'lang' => 'en-US'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('RU', ['/contact-i-18n/lang', 'id' => $model->id, 'lang' => 'ru-RU'], ['class' => 'btn btn-primary']) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>