<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = '修改: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '项目案例', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="Project-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
