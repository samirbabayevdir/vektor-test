<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Əlaqə';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= !$anyModel ? Html::a('Əlaqə, Yarat', ['create'], ['class' => 'btn btn-success']) : '' ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'number',
            'address',
            'info',
            //'whatsapp',
            //'facebook',
            //'instagram',
            //'linkedin',

            ['class' => 'common\grid\ActionColumn'],
        ],
    ]); ?>


</div>