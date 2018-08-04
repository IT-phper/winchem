<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Classes;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '产品信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要删除吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'class_id',
                'value' => function ($model) {
                    return Classes::getName($model->class_id);
                }
            ],
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
        ],
    ]) ?>

</div>
