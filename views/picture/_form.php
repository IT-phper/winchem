<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Picture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picture-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->fileInput()->label('图片：建议200px*240px') ?>
    
    <?php 
        if ($model->picture) {
            echo Html::img("/uploads/{$model->picture}", ['width' => 100]);
        } 
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model,'type')->textInput()->hiddenInput(['value'=>1])->label(false); ?>

    <?= $form->field($model, 'sub_type')->dropDownList(['1' => '资质', '2' => '专利', '3'=> '认证'], ['style' => 'width:120px']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
