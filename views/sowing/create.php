<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Picture */

$this->title = '新增轮播图';
$this->params['breadcrumbs'][] = ['label' => '轮播图', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picture-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
