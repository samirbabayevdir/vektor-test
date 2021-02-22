<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ResponseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cavablar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="response-index p-4">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'created_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => ['white-space: nowrap']]
            ],
            'name',
            'surname',
            'email:email',
            'phone',
            'message:ntext',

            [
                'class' => 'common\grid\ActionColumn',
                // 'template' => '{update} {delete}',
                'buttons' => [

                    'update' => function ($url, $model, $key) {

                        return '';
                    },

                ],
            ],
        ],
    ]); ?>


</div>