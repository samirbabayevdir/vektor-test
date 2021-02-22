<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view p-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dəyişdir', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Sil', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bu Kateqoriyanı Silməyə Əminsən?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return isset($model->category['name']) ? $model->category['name'] : 'Baş Kateqoriya';
                },
            ],
            'name',
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
            [
                'attribute' => 'status',
                'format' => ['html'],
                'value' => function ($model) {
                    return Html::tag('span', $model->status ? 'Aktiv' : 'Qeyri Aktiv', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                    ]);
                }
            ],
            'keywords:ntext',
            'description:ntext',
        ],
    ]) ?>

</div>