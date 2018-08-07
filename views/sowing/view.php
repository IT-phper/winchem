<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Picture */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '轮播图', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要删除这一条吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'picture',
            [
                'attribute' => 'picture',
                'format' => ['image', ['width' => '160', 'height' => '100',]],
                'value' => function ($model) {
                    if ($model->picture) {
                        return "/uploads/{$model->picture}";
                    }
                }
            ],
            'name',
            'order',
//            'type',
//            'sub_type',
           
        ],
    ]) ?>

</div>
