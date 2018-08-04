<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = '新增 设备产品类别';
$this->params['breadcrumbs'][] = ['label' => '设备产品', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
