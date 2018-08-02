<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '联系我们', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-view">


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
//            'initial',
             [  
                'attribute'=>'initial',
                'value' => function ($data) {
                    
                    if($data->initial == 1){
                        return '直辖市';
                    }
                    return $data->initial;
                },
                'footerOptions'=>['class'=>'hide'],//隐藏底部的当前列
            ],
            'province',
            'city',
            'addr',
            'tel',
            'order',
        ],
    ]) ?>

</div>
