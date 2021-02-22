<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Response */

$this->title = ($model->created_at);
$this->params['breadcrumbs'][] = ['label' => 'Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="response-view p-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            // 'id',
            'created_at:datetime',
            'name',
            'surname',
            'email:email',
            'phone',
            'message:ntext',
        ],
    ]) ?>

</div>