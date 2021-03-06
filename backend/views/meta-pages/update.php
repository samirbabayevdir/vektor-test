<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MetaPages */

$this->title = 'Update Meta Pages: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Meta Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meta-pages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
