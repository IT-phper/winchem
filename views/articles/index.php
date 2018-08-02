<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻状态';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            [
                'attribute' => 'column',
                'value' => function($m) {
                    switch ($m->column) {
                        case 1:
                            return '企业动态';
                        case 2:
                            return '行业资讯';
                    }
                },
                'filter' => [1=>'企业动态',2=>'行业资讯'],
            ],
//            'img',
            [
                'attribute' => 'img',
                'format'=>'raw',
                'value' => function($m) {
                    if ($m->img) {
                        return Html::img("/uploads/{$m->img}", ['width' => 200 , 'height' => 90]);
                    }
                }
            ],
            'order',
            //'content:ntext',
            'created',

            [
               'class' => 'yii\grid\ActionColumn',
               'header' => '操作', 
               'template' => '{delete} {update}',//只需要展示删除和更新
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
