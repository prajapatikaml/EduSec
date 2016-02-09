<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="login-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login_user_id')->textInput() ?>

    <?= $form->field($model, 'login_status')->textInput() ?>

    <?= $form->field($model, 'login_at')->textInput() ?>

    <?= $form->field($model, 'logout_at')->textInput() ?>

    <?= $form->field($model, 'user_ip_address')->textInput(['maxlength' => 16]) ?>

  <div class="col-sm-offset-1 col-lg-10">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' =>'btn btn-submit']) ?>
    </div>
  </div>
    <?php ActiveForm::end(); ?>

</div>
