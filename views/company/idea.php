<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '经营理念';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'picture1')->fileInput() ?>
    
    <?php 
        if ($model->picture1) {
            echo Html::img("/uploads/{$model->picture1}", ['width' => 500]);
        } 
    ?>
    
    <?= $form->field($model, 'idea1')->widget(\yii\redactor\widgets\Redactor::className()) ?>
    
    <?= $form->field($model, 'picture2')->fileInput() ?>
    
    <?php 
        if ($model->picture2) {
            echo Html::img("/uploads/{$model->picture2}", ['width' => 500]);
        } 
    ?>
    
    <?= $form->field($model, 'idea2')->widget(\yii\redactor\widgets\Redactor::className()) ?>
    
    <?= $form->field($model, 'picture3')->fileInput() ?>
    
    <?php 
        if ($model->picture3) {
            echo Html::img("/uploads/{$model->picture3}", ['width' => 500]);
        } 
    ?>
    
    <?= $form->field($model, 'idea3')->widget(\yii\redactor\widgets\Redactor::className()) ?>
    
    <div class="form-group">
        <?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



