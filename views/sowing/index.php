<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PictureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '轮播图';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'picture',
            [
                'attribute' => 'picture',
                'format'=>'raw',
                'value' => function($m) {
                    if ($m->picture) {
                        return Html::img("/uploads/{$m->picture}", ['width' => 200 , 'height' => 90]);
                    }
                }
            ],
            'name',
            'order',
//            'type',
            //'sub_type',
          

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
