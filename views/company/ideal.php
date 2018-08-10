<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '经营理念';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="form-group">
        <?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>
    </div>

    <?= $form->field($model, 'ideal')->widget(\yii\redactor\widgets\Redactor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
