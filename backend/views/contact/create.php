<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */

$this->title = 'Əlaqə, Yarat';
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>