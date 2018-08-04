<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Classes;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增产品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            [
                'attribute' => 'class_id',
                'value' => function ($model) {
                    return Classes::getName($model->class_id);
                },
                'filter' => Classes::getMainColumnName(),
                
            ],
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
//            'summary',
            'order',
            //'class_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
