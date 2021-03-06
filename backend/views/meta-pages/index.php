<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MetaPagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meta Açarlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-pages-index p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yarat Meta Açar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'title',
            // 'description:ntext',
            // 'keywords:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>