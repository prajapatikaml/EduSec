<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_login_id')->textInput(['maxlength' => 65]) ?>

    <?= $form->field($model, 'user_password')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'user_type')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'is_block')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="col-sm-offset-1 col-lg-10">
     <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' =>'btn btn-submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
