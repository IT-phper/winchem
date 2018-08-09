<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = '新增';
$this->params['breadcrumbs'][] = ['label' => '项目案例', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Project-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
