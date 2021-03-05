<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Məhsullar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Məhsul Yarat', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Məhsul Fotolar', ['/product/multiple'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category->name;
                }
            ],
            'name',
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    return Html::tag('span', $model->status ? 'Aktiv' : 'Qeyri Aktiv', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                    ]);
                }
            ],

            ['class' => 'common\grid\ActionColumn'],
        ],
    ]); ?>


</div>