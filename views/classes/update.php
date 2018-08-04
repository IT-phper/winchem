<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = '修改 清洁剂产品类别: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '清洁剂产品', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="classes-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
