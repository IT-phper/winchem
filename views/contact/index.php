<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '联系我们';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
