<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ModeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '业务模式';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mode-index">

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

            'name',
            'order',

            [
               'class' => 'yii\grid\ActionColumn',
               'header' => '操作', 
               'template' => '{delete} {update}',//只需要展示删除和更新
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
