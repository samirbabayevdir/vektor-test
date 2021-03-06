<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kateqoriyalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index p-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kateqoriyanı Yarat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'pager' => [
            'class' => LinkPager::class,
        ],
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'contentOptions' => [
                    'style' => 'width:30px'
                ]
            ],
            'name',
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return isset($model->category['name']) ? $model->category['name'] : 'Baş Kateqoriya';
                },
            ],
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    return Html::tag('span', $model->status ? 'Aktiv' : 'Qeyri Aktiv', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                    ]);
                }
            ],
            // 'image',
            // 'image_banner',
            //'status',
            //'keywords:ntext',
            //'description:ntext',

            ['class' => 'common\grid\ActionColumn'],
        ],
    ]); ?>


</div>