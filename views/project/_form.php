<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="Project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'column')->dropDownList(['1' => '社会化合作项目', '2' => '经典案例'], ['style' => 'width:180px']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    
    <?php 
        if ($model->img) {
            echo Html::img("/uploads/{$model->img}", ['width' => 100]);
        } 
    ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),
            [
            'clientOptions' => [
                'imageManagerJson' => ['/redactor/upload/image-json'],
                'imageUpload' => ['/redactor/upload/image'],
                'fileUpload' => ['/redactor/upload/file'],
                'lang' => 'zh_cn',
                'plugins' => ['clips', 'fontcolor','imagemanager']
            ]
        ] 
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
