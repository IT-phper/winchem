<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mode */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '业务模式', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mode-view">

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
            'name',
//            'content:ntext',
            'order',
        ],
    ]) ?>

</div>
