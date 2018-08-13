<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <?php 
        if ($model->img) {
            echo Html::img("/uploads/{$model->img}", ['width' => 300]);
        } 
    ?>
    
    <?= $form->field($model, 'summary')->widget(\yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model,'type')->textInput()->hiddenInput(['value'=>1])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
