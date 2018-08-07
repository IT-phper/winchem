<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '关于我们';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'chinese')->widget(\yii\redactor\widgets\Redactor::className()) ?>
    <?= $form->field($model, 'english')->widget(\yii\redactor\widgets\Redactor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



