<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Picture */

$this->title = '修改: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '公司荣耀', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="picture-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
