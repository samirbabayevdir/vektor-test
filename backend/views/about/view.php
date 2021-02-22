<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\About */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="about-view p-4">

    <h1><?= 'Haqqımızda' ?></h1>

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
            'description_one:ntext',
            'description_two:ntext',
            [
                'attribute' => 'image',
                'format' => ['html'],
                'value' => function ($model) {
                    return Html::img($model->getImageUrl(), ['style' => 'width: 150px']);
                }
            ],
            [
                'attribute' => 'image_banner',
                'format' => ['html'],
                'value' => function ($model) {
                    return Html::img($model->getImage_bannerUrl(), ['style' => 'width: 150px']);
                }
            ],
        ],
    ]) ?>

</div>