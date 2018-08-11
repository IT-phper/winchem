<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mode */

$this->title = '新增业务模式';
$this->params['breadcrumbs'][] = ['label' => '业务模式', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mode-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
