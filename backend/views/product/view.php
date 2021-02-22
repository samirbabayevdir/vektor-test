<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view p-4">

    <h1><?= Html::encode($this->title) ?></h1>

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
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category->name;
                }
            ],
            'name',
            'description:ntext',
            'keywords:ntext',
            [
                'attribute' => 'status',
                'format' => ['html'],
                'value' => function ($model) {
                    return Html::tag('span', $model->status ? 'Aktiv' : 'Qeyri Aktiv', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                    ]);
                }
            ],

        ],
    ]) ?>
    <div class="row">
        <?php

        foreach ($model->imgsUrl as $url) {
            echo Html::img($url, ['class' => ['col-md-3']]);
        }

        ?>
    </div>
</div>