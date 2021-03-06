<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductImgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Məhsul Fotoları';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-img-index p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'product_id',
                'value' => function ($model) {
                    return $model->product->category->name;
                }
            ],
            [
                'attribute' => 'product_id',
                'value' => function ($model) {
                    return $model->product->name;
                }
            ],
            'image',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img(Yii::$app->params['frontendUrl'] . '/storage/products/' . $model->image, ['style' => 'max-width:100px']);
                }
            ],

            [
                'class' => 'common\grid\ActionColumn',
                'buttons' => [

                    'view' => function ($url, $model, $key) {
                        return '';
                    },
                    'update' => function ($url, $model, $key) {
                        return '';
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="fas fa-trash"></span>', ['/product-img/delete', 'id' => $model->id], ['data-method' => 'post']);
                    },

                ],
            ],
        ],
    ]); ?>


</div>