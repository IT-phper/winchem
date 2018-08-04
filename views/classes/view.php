<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '清洁剂产品', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除吗?',
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
                'format' => ['image', ['width' => '300']],
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
