<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactI18n */

$this->title = Yii::t('app', 'Yarat Əlaqə ' . \Yii::$app->request->get('lang'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact I18ns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-i18n-create p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>