<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mode */

$this->title = '修改：' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '业务模式', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="mode-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
