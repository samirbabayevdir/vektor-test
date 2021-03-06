<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MetaPages */

$this->title = 'Yarat Meta Açar';
$this->params['breadcrumbs'][] = ['label' => 'Meta Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-pages-create  p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>