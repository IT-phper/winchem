<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '设备产品', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
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
            'name',
//            'img',
            [
                'attribute' => 'img',
                'format' => ['image', ['width' => '160', 'height' => '100',]],
                'value' => function ($model) {
                    if ($model->img) {
                        return "/uploads/{$model->img}";
                    }
                }
            ],
            'summary',
            'order',
//            'type',
        ],
    ]) ?>

</div>
