<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AboutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Haqqımızda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= !$anyModel ? Html::a('Haqqımızda Yarat', ['create'], ['class' => 'btn btn-success']) : '' ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'description_one:ntext',
            // 'description_two:ntext',
            // 'image',
            // 'image_banner',

            ['class' => 'common\grid\ActionColumn'],
        ],
    ]); ?>


</div>