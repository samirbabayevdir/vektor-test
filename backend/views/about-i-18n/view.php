<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AboutI18n */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'About I18ns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="about-i18n-view p-4">

    <h1><?= $model->lang ?></h1>
    <p>
        <?= Html::a('Yenilə', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sil', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_ref',
            'lang',
            'description_one:ntext',
            'description_two:ntext',
        ],
    ]) ?>

</div>